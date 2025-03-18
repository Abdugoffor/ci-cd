<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $query = Presence::query();

        if ($request->has('name') && $request->name) {
            $name = $request->input('name');
            $query->whereHas('participant', function ($q) use ($name) {
                $q->where('first_name', 'like', '%' . $name . '%');
            });
        }

        if ($request->has('date') && $request->date) {

            $date = $request->input('date');

            $query->whereDate('created_at', $date);
        }

        $models = $query->orderByDesc('id')->paginate(10);

        return view('admin.presences.index', [
            'models' => $models,
            'name'   => $request->input('name'),
            'date'   => $request->input('date'),
        ]);
    }
}
