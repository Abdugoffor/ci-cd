<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Language;
use App\Models\News;
use App\Models\Partner;
use App\Models\Tournament;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index()
    {
        $model = Tournament::where('is_active', true)->orderByDesc('id')->first();

        $news = News::where('is_active', true)->orderByDesc('id')->limit(3)->get();

        $hotels = Hotel::where('is_active', true)->orderByDesc('id')->limit(10)->get();

        $partners = Partner::where('is_active', true)->orderByDesc('id')->limit(10)->get();

        return view("client.index", ['model' => $model, 'news' => $news, 'hotels' => $hotels, 'partners' => $partners]);
    }

    public function changeLanguage($lang)
    {
        $langs = getLanguage()->pluck('slug')->toArray();

        if (in_array($lang, $langs)) {

            session()->put('lang', $lang);

            App::setLocale($lang);

            $referer = request()->header('referer');

            $refererPath = parse_url($referer, PHP_URL_PATH);


            if ($refererPath) {

                $segments = explode('/', trim($refererPath, '/'));


                if (!empty($segments) && in_array($segments[0], $langs)) {
                    $segments[0] = $lang;
                }


                $newUrl = '/' . implode('/', $segments);

                return redirect($newUrl);
            }


            return redirect("/$lang");
        }

        return redirect()->back();

        // $lang = Language::where('slug', $lang)->where('is_active', true)->first();

        // if ($lang) {

        //     session()->put('lang', $lang->slug);

        //     App::setLocale($lang->slug);
        // }
        // return redirect()->back();
        

        // $language = Language::where('slug', $lang)->where('is_active', true)->first();

        // if ($language) {

        //     session()->put('lang', $language->slug);

        //     App::setLocale($language->slug);
        // }

        // $previousUrl = url()->previous();

        // $urlParts = parse_url($previousUrl);

        // $path = $urlParts['path'] ?? '/';

        // $query = isset($urlParts['query']) ? $urlParts['query'] : '';

        // parse_str($query, $params);

        // $params['lang'] = $language->slug ?? $lang;

        // $newQuery = http_build_query($params);

        // return redirect()->to($path . ($newQuery ? '?' . $newQuery : ''));

    }
}
