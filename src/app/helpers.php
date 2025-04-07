<?php

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

if (! function_exists('slug')) {
    function slug(string $data)
    {
        $cyrillicAlphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
        $latinAlphabet    = ['a', 'b', 'v', 'g', 'd', 'e', 'yo', 'j', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sch', '', 'y', '', 'e', 'yu', 'ya'];

        $str = str_replace($cyrillicAlphabet, $latinAlphabet, strtolower(trim($data)));
        $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
        $str = str_replace(' ', '-', $str);
        return preg_replace('/\-{2,}/', '-', $str);
    }
}

if (! function_exists('isActive')) {
    function isActive()
    {
        if (Auth::check()) {
            if (! Auth::user()->status) {
                Auth::logout();
            }
        }
    }
}

if (! function_exists('getLanguage')) {
    function getLanguage()
    {
        return Language::where('is_active', true)->get();
        // return Cache::remember('active_languages', now()->addMinutes(180), function () {
        // return Language::where('is_active', true)->get();
        // });
    }
}

if (!function_exists('historyCheck')) {
    function historyCheck($model)
    {
        if (!$model || !$model->histories()->count()) {
            return '';
        }

        $html = '<!-- Button trigger modal -->
        <a href="#" class="btn btn-outline-warning ml-2"
            data-toggle="modal" data-target="#panel_right' . $model->id . '">
            <i class="icon-history"></i>
        </a>
        <!-- Right panel -->
        <div id="panel_right' . $model->id . '" class="modal modal-right fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-transparent border-0 align-items-center">
                        <h5 class="modal-title font-weight-semibold">' . getTranslation('history') . '</h5>
                        <button type="button" class="btn btn-icon btn-light btn-sm border-0 rounded-pill ml-auto"
                            data-dismiss="modal"><i class="icon-cross2"></i></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="card card-body border-top-teal">
                            <div class="list-feed">';

        foreach ($model->histories as $history) {
            $userName  = optional($history->user)->name ?: '';
            $createdAt = $history->created_at->format('d-M-Y, H:i');

            $html .= '<div class="list-feed-item">
                    <a href="#" class="text-default">' . $userName . '</a> <br>
                    <span class="text-muted">' . $history->action . ', ' . $createdAt . '</span>
                    <ul class="list-unstyled mt-2">';

            $changes = is_string($history->changes) ? json_decode($history->changes, true) : $history->changes;

            if (is_array($changes)) {
                foreach ($changes as $key => $value) {
                    if ($key !== 'updated_at') {
                        $formattedKey = ucfirst(str_replace('_', ' ', $key));

                        if (is_string($value) && $jsonDecoded = json_decode($value, true)) {
                            $value = $jsonDecoded;
                        }

                        if (in_array($key, ['photo', 'logo']) && is_string($value)) {
                            // Rasm maydoni bo‘lsa <img> bilan chiqarish
                            $formattedValue = '<img src="' . asset($value) . '" width="100" alt="' . $formattedKey . '">';
                        } elseif ($key === 'is_active') {
                            // is_active maydoni bo‘lsa tarjimalangan qiymat chiqarish
                            $formattedValue = $value == 1 ? getTranslation('assets') : getTranslation('not-active');
                        } elseif (is_array($value)) {
                            $formattedValue = implode('', array_map(fn($lang, $val) => "<strong><br>$lang</strong>: $val", array_keys($value), $value));
                        } else {
                            $formattedValue = $value;
                        }

                        $html .= '<li>' . $formattedKey . ': <span style="word-wrap: break-word; white-space: normal; overflow: hidden;">' . $formattedValue . '</span></li>';
                    }
                }
            } else {
                $html .= '<li style="word-wrap: break-word; white-space: normal; overflow: hidden;">' . $history->changes . '</li>';
            }

            $html .= '</ul></div>';
        }

        $html .= '</div></div></div></div></div></div><!-- /right panel -->';
        return $html;
    }
}


if (! function_exists('getTranslation')) {
    function getTranslation($slug)
    {
        return Cache::remember("menyu.{$slug}_" . App::getLocale(), now()->addMinutes(180), function () use ($slug) {
            $translation = Translation::where('slug', $slug)->first();

            if ($translation) {
                return $translation->name[App::getLocale()] ?? $translation->name['default'];
            }

            return null;
        });
    }
}

if (! function_exists('getLocale')) {
    function getLocale($model)
    {
        if (! $model || ! is_array($model)) {
            return '';
        }

        $lang = App::getLocale();

        if ($lang && isset($model[$lang])) {
            return $model[$lang];
        }

        return $model['default'] ?? '';
    }
}

if (! function_exists('getTranslationValidate')) {
    function getTranslationValidate($key) {}
}
if (! function_exists('validateTranslation')) {
    function validateTranslation($col)
    {
        $languages = getLanguage()->pluck('slug')->toArray();

        $rules = [];

        foreach ($languages as $lang) {
            $rules["$col.$lang"] = 'required|string|max:5000000';
        }

        return $rules;
    }
}

if (! function_exists('cacheClear')) {
    function cacheClear($slug)
    {
        $languages = getLanguage();

        foreach ($languages as $lang) {
            Cache::forget("menyu.{$slug}_{$lang->slug}");
        }
    }
}

if (! function_exists('activeMenu')) {
    function activeMenu($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (! function_exists('hasRole')) {
    function hasRole(array $roles): bool
    {
        return Auth::check() && in_array(Auth::user()->role, $roles);
    }
}
