<?php
namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Jobs\VerifyEmailJob;
use App\Models\AccreditationCategory;
use App\Models\Country;
use App\Models\Participant;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(ApplicationStoreRequest $request)
    {
        $models = Participant::create($request->all());

        $verificationCode = rand(100000, 999999);

        cache()->put('email_verification_' . $models->email, $verificationCode, now()->addMinutes(5));

        dispatch(new VerifyEmailJob($models->email, $verificationCode));

        return view('auth.verify_email', ['email' => $models->email]);
    }
    public function createAdditional(Participant $application)
    {
        $countries = Country::all();
        $accreditationCategories = AccreditationCategory::all();
        return view('applications.additional', ['application' => $application, 'countries' => $countries, 'accreditationCategories' => $accreditationCategories]);
    }
    public function storeAdditional(Request $request, Participant $application)
    {
        dd($request->all(), $application);
        $application->update($application->id, request()->all());
        return redirect()->route('application.index');
    }

}
