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
            // Email orqali oxirgi Participant modelini olish
            $model = Participant::where('email', session()->get('email'))
                ->orderBy('id', 'desc')
                ->first();

            if (! $model) {
                Log::warning("Participant topilmadi: " . session()->get('email'));
                return redirect('/')->with('error', 'Foydalanuvchi topilmadi.');
            }

            $data = $request->all();

            // Passport nusxasini yuklash
            if ($request->hasFile('passport_copy') && $request->file('passport_copy')->isValid()) {
                $file      = $request->file('passport_copy');
                $extension = $file->getClientOriginalExtension();
                $filename  = time() . '_' . Str::random(40) . '.' . $extension;

                // Faylni public/uploaded papkasiga ko‘chirish
                $file->move(public_path('uploaded'), $filename);
                $data['passport_copy'] = 'uploaded/' . $filename;
                Log::info("Passport nusxasi yuklandi: " . public_path('uploaded/' . $filename));
            }

            // Rasmni yuklash
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file      = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename  = time() . '_' . Str::random(40) . '.' . $extension;

                // Faylni public/uploaded papkasiga ko‘chirish
                $file->move(public_path('uploaded'), $filename);
                $data['photo'] = 'uploaded/' . $filename;
                Log::info("Rasm yuklandi: " . public_path('uploaded/' . $filename));
            }

            // Modelni yangilash
            $model->update($data);
            Log::info("Participant yangilandi: " . $model->id);

            return redirect('/')->with('success', 'Ma’lumotlar muvaffaqiyatli yangilandi.');

        } catch (Exception $e) {
            Log::error("Ma’lumotlarni saqlashda xatolik: " . $e->getMessage());
            return redirect('/')->with('error', 'Xatolik yuz berdi: ' . $e->getMessage());
        }
    }

}
