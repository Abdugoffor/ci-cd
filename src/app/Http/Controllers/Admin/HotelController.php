<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelStoreRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function index()
    {
        $models = Hotel::orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query  = Hotel::query();
        $locale = app()->getLocale();

        if ($request->filled('title')) {
            $query->where("title->$locale", 'LIKE', "%{$request->title}%");
        }

        if ($request->filled('description')) {
            $query->where("description->$locale", 'LIKE', "%{$request->description}%");
        }

        if ($request->filled('text')) {
            $query->where("text->$locale", 'LIKE', "%{$request->text}%");
        }

        if ($request->filled('rating')) {
            $query->where('rating', 'LIKE', "%{$request->rating}%");
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'LIKE', "%{$request->phone}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['title', 'description', 'text', 'rating', 'phone', 'is_active']));

        return view('admin.hotels.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.hotels.create');
    }
    public function store(HotelStoreRequest $request)
    {
        $data = $request->all();

        $data['title']['default'] = reset($data['title']);

        $data['description']['default'] = reset($data['description']);

        $data['text']['default'] = reset($data['text']);

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        Hotel::create($data);

        return redirect()->route('hotels.index');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', ['hotel' => $hotel]);
    }

    public function update(HotelStoreRequest $request, Hotel $hotel)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        $hotel->update($data);

        return redirect()->route('hotels.index');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index');
    }
    public function status(Hotel $hotel)
    {
        $hotel->update(['is_active' => ! $hotel->is_active]);
        return back();
    }
}
