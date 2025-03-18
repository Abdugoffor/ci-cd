<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Partner;

class BadgesController extends Controller
{
    public function verify(string $badges)
    {
        $participant = Participant::where('qk_code', $badges)->first();

        $partners    = Partner::where('is_active', true)->orderByDesc('id')->limit(3)->get();
        
        return view('client.test', ['participant' => $participant, 'partners' => $partners]);
    }
}
