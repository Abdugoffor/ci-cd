<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Presence;
use App\Models\Tournament;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $query = Presence::query();

        // Name bo'yicha qidiruv
        if ($request->has('name') && $request->name) {
            $name = $request->input('name');
            $query->whereHas('participant', function ($q) use ($name) {
                $q->where('first_name', 'like', '%' . $name . '%')
                    ->orWhere('last_name', 'like', '%' . $name . '%');
            });
        }

        // Date bo'yicha qidiruv
        if ($request->has('date') && $request->date) {
            $date = $request->input('date');
            $query->whereDate('created_at', $date);
        }

        // Tournament bo'yicha qidiruv
        if ($request->has('tournament_id') && $request->tournament_id) {
            $tournament_id = $request->input('tournament_id');
            $query->whereHas('participant', function ($q) use ($tournament_id) {
                $q->where('tournament_id', $tournament_id);
            });
        }

        // Country bo'yicha qidiruv (Participant va Tournament country_id larini birlashtirish)
        if ($request->has('country_id') && $request->country_id) {
            $country_id = $request->input('country_id');
            $query->whereHas('participant', function ($q) use ($country_id) {
                $q->where('country_id', $country_id) // Participant's country_id
                    ->orWhereHas('tournament', function ($t) use ($country_id) {
                        $t->where('country_id', $country_id); // Tournament's country_id
                    });
            });
        }

        $models = $query->orderByDesc('id')->paginate(10);

        $tournements = Tournament::orderByDesc('id')->get();
        $countries = Country::orderByDesc('id')->get();

        return view('admin.presences.index', [
            'models' => $models,
            'name'   => $request->input('name'),
            'date'   => $request->input('date'),
            'tournament_id' => $request->input('tournament_id'),
            'country_id' => $request->input('country_id'),
            'countries' => $countries,
            'tournements' => $tournements
        ]);
    }
}
