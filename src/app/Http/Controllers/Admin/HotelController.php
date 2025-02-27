<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelStoreRequest;
use App\Models\Hotel;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function index()
    {
        $models = Hotel::orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.hotels.create');
    }
    public function store(HotelStoreRequest $request)
    {
        $data = $request->all();

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
