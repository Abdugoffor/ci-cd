<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Language;
use App\Models\News;
use App\Models\Tournament;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index()
    {
        $model  = Tournament::where('status', 'pending')->orderByDesc('id')->first();

        $news   = News::where('is_active', true)->orderByDesc('id')->limit(3)->get();

        $hotels = Hotel::where('is_active', true)->orderByDesc('id')->limit(10)->get();

        return view("client.index", ['model' => $model, 'news' => $news, 'hotels' => $hotels]);
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
