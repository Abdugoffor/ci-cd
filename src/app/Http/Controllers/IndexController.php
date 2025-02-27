<?php
namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Tournament;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index()
    {
        $models = Tournament::where('status', 'pending')->get();
        return view('index', ['models' => $models]);
    }
    public function application(Tournament $application)
    {
        if ($application->status == 'pending') {
            return view('applications.application', ['application' => $application]);
        }
        return redirect('/');
    }
    public function changeLanguage($lang)
    {
        $lang = Language::where('slug', $lang)->where('is_active', true)->first();

        if ($lang) {

            session()->put('lang', $lang->slug);

            App::setLocale($lang->slug);
        }
        return back();
    }

}
