<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationAdditionRequest;
use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\FideIdRequest;
use App\Jobs\VerifyEmailJob;
use App\Models\AccreditationCategory;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Participant;
use App\Models\Tournament;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function application(FideIdRequest $request, Tournament $tournament)
    {
        session()->forget('player');

        if ($request->has("fide_id")) {

            $fideId = $request->fide_id;

            $url = "https://api.fide.com/regform/{$fideId}";

            try {

                $response = Http::get($url);

                $data = $response->body();

                $decodedData = json_decode($data, true);

                if (! empty($decodedData) && is_array($decodedData)) {

                    $player = $decodedData[0];

                    session()->put('player', $player);

                    if ($tournament->status == 'pending') {

                        return view('client.applications.application', ['tournament' => $tournament]);
                    }
                    return redirect('/');

                } else {
                    return back()->withErrors(['fide_id' => 'ID noto‘g‘ri!'])->withInput();
                }
            } catch (\Exception $e) {

                return back()->withErrors(['fide_id', $e->getMessage()]);
            }
        }

        if ($tournament->status == 'pending') {

            return view('client.applications.application', ['tournament' => $tournament]);
        }
        return redirect('/');
    }
    public function store(ApplicationStoreRequest $request)
    {
        $data = $request->all();

        $data['fide_id'] = session()->get('player')['id_number'] ?? null;

        $model = Participant::create($request->all());

        $verificationCode = rand(100000, 999999);

        cache()->put('email_verification_' . $model->email, $verificationCode, now()->addMinutes(5));

        session()->put('model_id', $model->id);

        dispatch(new VerifyEmailJob($model->email, $verificationCode));

        return redirect()->route('application.verify.email', ['model' => $model->id]);

    }

    public function applicationVerifyEmail(Participant $model)
    {
        if (session()->get('model_id') != $model->id) {

            return redirect('/');
        }

        return view('client.verify_email', ['model' => $model]);
    }
    public function createAdditional(Participant $model)
    {
        if (session()->get('model_id') != $model->id) {

            return redirect('/');
        }

        $countries = Country::all();

        $accreditationCategories = AccreditationCategory::where('is_active', true)->get();

        $hotels = Hotel::where('is_active', true)->get();

        return view('client.applications.additional', ['model' => $model, 'hotels' => $hotels, 'countries' => $countries, 'accreditationCategories' => $accreditationCategories]);
    }
    public function storeAdditional(ApplicationAdditionRequest $request, Participant $model)
    {
        $data = $request->all();
        // $file = $request->file('passport_copy');
        // dd([
        //     'is_valid' => $file->isValid(),
        //     'size' => $file->getSize(), // Hajmi baytlarda (1MB = 1048576 byte)
        //     'max_allowed' => 5120 * 1024, // Laravel 5MB limit (baytlarda)
        //     'mime_type' => $file->getMimeType(),
        // ]);

        if ($request->hasFile('passport_copy') && $request->file('passport_copy')->isValid()) {

            $file = $request->file('passport_copy');

            $extension = $file->getClientOriginalExtension();

            $filename = date('d-m-Y') . '_' . Str::random(40) . '.' . $extension;

            $file->move(public_path('uploaded'), $filename);

            $data['passport_copy'] = 'uploaded/' . $filename;
        }

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();

            $filename = date('d-m-Y') . '_' . Str::random(40) . '.' . $extension;

            $file->move(public_path('uploaded'), $filename);

            $data['photo'] = 'uploaded/' . $filename;
        }

        $model->update($data);

        $model->playerInfo()->create(session()->get('player'));

        session()->forget('player');

        return redirect('/')->with('notification', getTranslation('notification'));

    }

}
