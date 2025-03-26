<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Partner;

class BadgesController extends Controller
{
    public function verify(string $badges)
    {
        $domain = request()->getSchemeAndHttpHost();

        $qk_code = "{$domain}/badge-verify/{$badges}";

        $participant = Participant::where('qk_code', $qk_code)->first();
        
        $partners    = Partner::where('is_active', true)->orderByDesc('id')->limit(5)->get();
        
        return view('client.test', ['participant' => $participant, 'partners' => $partners]);
    }
}
