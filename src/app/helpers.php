<?php

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

if (! function_exists('checkRole')) {
    function checkRole(string $role)
    {
        if (Auth::user()->status && Auth::user()->role == $role) {
            return true;
        }
        return false;
    }
}

if (! function_exists('getLanguage')) {
    function getLanguage()
    {
        return Language::where('is_active', true)->get();
    }
}

if (! function_exists('historyCheck')) {
    function historyCheck($model)
    {
        if (! $model || ! $model->histories()->count()) {
            return ''; // Agar tarix bo'lmasa, hech narsa qaytarmaydi
        }

        $html = '<!-- Button trigger modal -->
            <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3"
                data-toggle="modal" data-target="#panel_right' . $model->id . '">
                <i class="icon-history"></i>
            </a>
            <!-- Right panel -->
            <div id="panel_right' . $model->id . '" class="modal modal-right fade" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent border-0 align-items-center">
                            <h5 class="modal-title font-weight-semibold">История</h5>
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
                        <a href="#">' . $userName . '<br> ' . $history->action . ', ' . $createdAt . '</a>';

            if (is_array($history->changes) || is_object($history->changes)) {
                $changes = is_string($history->changes) ? json_decode($history->changes, true) : $history->changes;

                foreach ($changes as $key => $value) {
                    if ($key !== 'logo' && $key !== 'updated_at') {
                        $formattedKey   = ucfirst(str_replace('_', ' ', $key));
                        $formattedValue = is_array($value) ? implode(', ', $value) : $value;
                        $html .= '<li>' . $formattedKey . ': <span>' . $formattedValue . '</span></li>';
                    }
                }
            } else {
                $html .= '<p>' . $history->changes . '</p>';
            }

            $html .= '</div>';
        }

        $html .= '</div></div></div></div></div></div><!-- /right panel -->';
        return $html;
    }
}

if (! function_exists('getTranslation')) {
    function getTranslation($slug)
    {
        $translation = Translation::where('slug', $slug)->first();

        if ($translation) {
            if ($translation->name[App::getLocale()]) {
                return $translation->name[App::getLocale()];
            }
            return $translation->default;
        }
        return null;
    }
}
