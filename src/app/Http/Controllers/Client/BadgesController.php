<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Participant;

class BadgesController extends Controller
{
    public function verify(string $badges)
    {
        $participant = Participant::where('qk_code', $badges)->first();
        
        return view('client.badge', ['participant' => $participant]);
    }
}
