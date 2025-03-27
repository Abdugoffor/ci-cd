<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationAdditionRequest;
use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\FideIdRequest;
use App\Jobs\Client\PendingAppJob;
use App\Jobs\Client\VerifyEmailJob;
use App\Models\AccreditationCategory;
use App\Models\Aferta;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Participant;
use App\Models\PlayerInfo;
use App\Models\Tournament;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

                        return view('client.applications.application', ['tournament' => $tournament, 'fide_id_success' => getTranslation('fide_id_success')]);
                    }
                    return redirect('/');

                } else {
                    return back()->withErrors(['fide_id' => getTranslation('fide_id')])->withInput();
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

        $key = Str::random(8);

        $data['fide_id'] = session()->get('player')['id_number'] ?? null;
        $data['key']     = $key;

        try {
            $model = Participant::create($data);
        } catch (\Exception $e) {
            return response()->json('Ma\'lumotni saqlashda xatolik: ' . $e->getMessage());
        }

        $verificationCode = rand(100000, 999999);

        $data = [
            'participant_id'    => $model->id,
            'verification_code' => $verificationCode,
            'key'               => $key,
            'link'              => route('chack.application'),
        ];

        cache()->put('email_verification_' . $model->email, $verificationCode, now()->addMinutes(5));
        session()->put('model_id', $model->id);

        try {
            dispatch(new VerifyEmailJob($model->email, $data));
        } catch (\Exception $e) {
            Log::info("Email sent successfully to: {$e->getMessage()}");
        }

        return redirect()->route('application.verify.email', ['model' => $model->id, 'message' => getTranslation('message')]);

    }

    public function applicationVerifyEmail(Participant $model, $message)
    {
        if (session()->get('model_id') != $model->id) {

            return redirect('/');
        }

        $tournament = Tournament::findOrFail($model->tournament_id);

        return view('client.verify_email', ['model' => $model, 'message_notifay' => $message, 'tournament' => $tournament]);
    }
    public function createAdditional(Participant $model)
    {
        if (session()->get('model_id') != $model->id) {

            return redirect('/');
        }

        $countries = Country::all();

        $accreditationCategories = AccreditationCategory::where('is_active', true)->get();

        $hotels = Hotel::where('is_active', true)->get();

        return view('client.applications.additional', ['model' => $model, 'hotels' => $hotels, 'notification' => getTranslation('notification'), 'countries' => $countries, 'accreditationCategories' => $accreditationCategories]);
    }

    public function storeAdditional(ApplicationAdditionRequest $request, Participant $model)
    {
        $data = $request->all();

        if ($request->hasFile('passport_copy')) {

            $data['passport_copy'] = FileUploadService::uploadFile($request->file('passport_copy'));
        }

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $data['status'] = 'pending';

        $model->update($data);

        try {
            if (session()->has('player') && ! is_null(session()->get('player'))) {

                Log::info('Player sessiyasi: ', session()->get('player'));

                $playerData = session()->get('player');

                $model->playerInfo()->create($playerData);

                session()->forget('player');
            }
        } catch (\Exception $e) {

            Log::error('Sessiya bilan ishlashda xatolik: ' . $e->getMessage());

            return response()->json(['Sessiya bilan ishlashda xatolik: ' . $e->getMessage()]);

        }

        dispatch(new PendingAppJob($model));

        return redirect()->route('chack.application')
            ->with([
                'notification' => getTranslation('notification'),
            ]);

    }
    public function aferta()
    {
        $model = Aferta::orderByDesc('id')->first();

        return view('client.aferta', ['model' => $model]);
    }
}
