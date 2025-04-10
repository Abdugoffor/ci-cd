<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneStoreRequest;
use App\Http\Requests\ZoneUpdateRequest;
use App\Models\Participant;
use App\Models\ParticipantZone;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function viewSub(Zone $zone)
    {
        $models = $zone->children()->with('parent','histories')->orderBy('id', 'desc')->paginate(10);
        return view('admin.zones.index', ['models' => $models, 'zone' => $zone]);
    }
    public function index()
    {
        $models = Zone::with('parent','histories')->where('parent_id', null)->orderByDesc('id')->paginate(10);
        return view('admin.zones.index', ['models' => $models]);
    }

    public function search(Request $request)
    {
        $query  = Zone::query();
        $locale = app()->getLocale();

        if ($request->filled('title')) {
            $query->where("title", 'LIKE', "%{$request->title}%");
        }

        if ($request->filled('description')) {
            $query->where("description->$locale", 'LIKE', "%{$request->description}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        if ($request->filled('parent_id')) {
            $query->where('parent_id', $request->parent_id);
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['title', 'description', 'is_active']));

        return view('admin.zones.index', ['models' => $models]);
    }

    public function createSub(Zone $zone)
    {
        return view('admin.zones.create', ['zone' => $zone]);
    }

    public function create()
    {
        return view('admin.zones.create');
    }
    public function store(ZoneStoreRequest $request)
    {
        $data = $request->all();

        if (! empty($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        $zone = Zone::create($data);

        if ($zone->parent_id != null) {
            return redirect()->route('sub-zones.view', $zone->parent_id)->with('notification', getTranslation('notification'));
        }

        return redirect()->route('zones.index')->with('notification', getTranslation('notification'));
    }

    public function show(Zone $zone)
    {
        return view('admin.zones.show', ['model' => $zone]);
    }
    public function edit(Zone $zone)
    {
        return view('admin.zones.edit', ['zone' => $zone]);
    }

    public function update(ZoneUpdateRequest $request, Zone $zone)
    {
        $data = $request->all();

        if (! empty($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        $zone->update($data);

        if ($zone->parent_id != null) {
            return redirect()->route('sub-zones.view', $zone->parent_id)->with('notification', getTranslation('notification'));
        }

        return redirect()->route('zones.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Zone $zone)
    {
        if ($zone->parent_id != null) {

            $id = $zone->parent_id;

            $zone->delete();

            return redirect()->route('sub-zones.view', $id)->with('notification', getTranslation('notification'));
        }

        $zone->delete();

        return redirect()->route('zones.index')->with('notification', getTranslation('notification'));
    }

    public function select(Zone $zone, int $turnir)
    {
        // $band = ParticipantZone::where('tournament_id', $turnir)
        //     ->where('zone_id', $zone->id)
        //     ->exists();

        // if ($band) {
        //     return response()->json([
        //         'isOccupied' => true,
        //     ]);
        // }

        $children = $zone->children()
            ->where('is_active', true)
            ->get(['id', 'title', 'description']);

        return response()->json([
            'isOccupied' => false,
            'children'   => $children,
        ]);
    }

    public function storeZone(Request $request, Participant $app)
    {
        $zones = $request->input('zones', []);

        $tournamentId = $app->tournament_id;

        $id = end($zones);

        $data = ParticipantZone::where('tournament_id', $tournamentId)->where('zone_id', $id)->exists();

        $syncData = [];

        foreach ($zones as $zoneId) {

            if ($zoneId) {
                $syncData[$zoneId] = ['tournament_id' => $tournamentId];
            }
        }

        if (count($zones) > 3) {

            if (! $data) {

                $app->zones()->sync($syncData);

                Zone::findOrFail($id)->update(['is_active' => false]);

                return redirect()->back()->with('notification', getTranslation('notification'));
            }

            return redirect()->back()->with('notification', getTranslation('error_notification'));
        }

        $app->zones()->sync($syncData);

        return redirect()->back()->with('notification', getTranslation('notification'));
    }
}
