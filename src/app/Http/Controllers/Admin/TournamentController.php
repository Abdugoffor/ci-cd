<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentStoreRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tournament;
use Illuminate\Support\Str;

class TournamentController extends Controller
{
    public function index()
    {
        $models = Tournament::orderByDesc('id')->paginate(10);
        return view('admin.tournament.index', ['models' => $models]);
    }
    public function create()
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('admin.tournament.create', ['categories' => $categories, 'countries' => $countries]);
    }
    public function store(TournamentStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file       = $request->file('logo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['logo'] = 'uploaded/' . $filename;
        }

        $data['name'] = [
            'uz' => $request->input('uz'),
            'ru' => $request->input('ru'),
            'en' => $request->input('en'),
        ];

        Tournament::create($data);

        return redirect()->route('tournament.index');
    }

    public function edit(Tournament $tournament)
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('admin.tournament.edit', ['categories' => $categories, 'countries' => $countries, 'tournament' => $tournament]);
    }

    public function update(TournamentStoreRequest $request, Tournament $tournament)
    {
        $data = $request->all();
        
        if ($request->hasFile('logo')) {
            $file       = $request->file('logo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = time() . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['logo'] = 'uploaded/' . $filename;
        }

        $data['name'] = [
            'uz' => $request->input('uz'),
            'ru' => $request->input('ru'),
            'en' => $request->input('en'),
        ];
        $tournament->update($data);

        return redirect()->route('tournament.index');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return back();
    }
    public function statusUpdate(Tournament $tournament, string $status)
    {
        if (in_array($status, ['pending', 'ongoing', 'completed', 'canceled'])) {
            $tournament->update(['status' => $status]);
        }
        return back();
    }

}
