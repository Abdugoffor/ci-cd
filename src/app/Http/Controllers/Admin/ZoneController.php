<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneStoreRequest;
use App\Http\Requests\ZoneUpdateRequest;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $models = Zone::where('parent_id', null)->orderByDesc('id')->paginate(10);
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

        $models = $query->paginate(10);

        $models->appends($request->only(['title', 'description', 'is_active']));

        return view('admin.zones.index', ['models' => $models]);
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

        Zone::create($data);

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

        return redirect()->route('zones.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Zone $menu)
    {
        $menu->delete();
        return redirect()->route('zones.index')->with('notification', getTranslation('notification'));
    }
}
