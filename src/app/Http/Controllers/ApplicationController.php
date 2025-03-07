<?php
namespace App\Http\Controllers;

use App\Http\Requests\ApplicationAdditionRequest;
use App\Http\Requests\ApplicationStoreRequest;
use App\Jobs\VerifyEmailJob;
use App\Models\AccreditationCategory;
use App\Models\Country;
use App\Models\Participant;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function store(ApplicationStoreRequest $request)
    {
        $models = Participant::create($request->all());

        $verificationCode = rand(100000, 999999);

        cache()->put('email_verification_' . $models->email, $verificationCode, now()->addMinutes(5));

        dispatch(new VerifyEmailJob($models->email, $verificationCode));

        session()->put('email', $models->email);

        return view('auth.verify_email');
    }
    public function createAdditional()
    {
        $application             = Participant::where('email', session()->get('email'))->orderBy('id', 'desc')->first();
        $countries               = Country::all();
        $accreditationCategories = AccreditationCategory::all();
        return view('applications.additional', ['application' => $application, 'countries' => $countries, 'accreditationCategories' => $accreditationCategories]);
    }
    public function storeAdditional(ApplicationAdditionRequest $request)
    {
        try {
            $model = Participant::where('email', session()->get('email'))
                ->orderBy('id', 'desc')
                ->first();

            if (! $model) {
                return redirect('/')->with('error', 'Foydalanuvchi topilmadi.');
            }

            $data = $request->all();

            if ($request->hasFile('passport_copy') && $request->file('passport_copy')->isValid()) {
                $file      = $request->file('passport_copy');
                $extension = $file->getClientOriginalExtension();
                $filename  = date('d-m-Y') . '_' . Str::random(40) . '.' . $extension;

                $file->move(public_path('uploaded'), $filename);
                $data['passport_copy'] = 'uploaded/' . $filename;
            }

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file      = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename  = date('d-m-Y') . '_' . Str::random(40) . '.' . $extension;

                $file->move(public_path('uploaded'), $filename);
                $data['photo'] = 'uploaded/' . $filename;
            }

            $model->update($data);

            return redirect('/')->with('notification',getTranslation('notification'));

        } catch (Exception $e) {
            return redirect('/')->with('notification',$e->getMessage());
        }
    }

}
