<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentStoreRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TournamentController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $countries = Country::all();

        $models = Tournament::orderByDesc('id')->paginate(10);

        return view('admin.tournament.index', ['models' => $models, 'categories' => $categories, 'countries' => $countries]);
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $countries  = Country::all();
        $query      = Tournament::query();
        $locale     = app()->getLocale();

        if ($request->filled('name')) {
            $query->where("name->$locale", 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('registration_start')) {
            $query->whereDate('registration_start', $request->registration_start);
        }

        if ($request->filled('registration_end')) {
            $query->whereDate('registration_end', $request->registration_end);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end_date', $request->end_date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $models = $query->paginate(10);
        $models->appends($request->only([
            'name',
            'category_id',
            'country_id',
            'registration_start',
            'registration_end',
            'start_date',
            'end_date',
            'status',
        ]));

        return view('admin.tournament.index', [
            'models'     => $models,
            'categories' => $categories,
            'countries'  => $countries,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('admin.tournament.create', ['categories' => $categories, 'countries' => $countries]);
    }
    public function store(TournamentStoreRequest $request)
    {
        $data                           = $request->all();
        $data['name']['default']        = reset($data['name']);
        $data['description']['default'] = reset($data['description']);

        if ($request->hasFile('logo')) {
            $file       = $request->file('logo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['logo'] = 'uploaded/' . $filename;
        }

        Tournament::create($data);

        return redirect()->route('tournaments.index');
    }

    public function edit(Tournament $tournament)
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('admin.tournament.edit', ['categories' => $categories, 'countries' => $countries, 'tournament' => $tournament]);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file       = $request->file('logo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = time() . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['logo'] = 'uploaded/' . $filename;
        }
        $tournament->update($data);

        return redirect()->route('tournaments.index');
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
