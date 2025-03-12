<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index(Hotel $hotel)
    {
        $hotels = Hotel::whereNotIn("id", [$hotel->id])->where('is_active', true)->orderByDesc('id')->limit(10)->get();

        return view('client.hotel', ['hotel' => $hotel, 'hotels' => $hotels]);
    }
}
