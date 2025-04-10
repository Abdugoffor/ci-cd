<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\TournamentStoreRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tournament;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $countries = Country::all();

        $models = Tournament::with('category', 'country', 'histories')->orderByDesc('id')->paginate(10);

        return view('admin.tournament.index', ['models' => $models, 'categories' => $categories, 'countries' => $countries]);
    }
    public function search(Request $request)
    {
        $categories = Category::all();

        $countries = Country::all();

        $query = Tournament::query()->with('category', 'country', 'histories');

        $locale = app()->getLocale();

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

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
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
            'is_active',
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

            $data['logo'] = FileUploadService::uploadFile($request->file('logo'));
        }

        Tournament::create($data);

        return redirect()->route('tournaments.index')->with('notification', getTranslation('notification'));
    }

    public function edit(Tournament $tournament)
    {
        $categories = Category::all();
        $countries  = Country::all();
        return view('admin.tournament.edit', ['categories' => $categories, 'countries' => $countries, 'tournament' => $tournament]);
    }
    public function show(Tournament $tournament)
    {
        return view('admin.tournament.show', ['model' => $tournament]);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {

            $data['logo'] = FileUploadService::uploadFile($request->file('logo'));
        }

        $tournament->update($data);

        return redirect()->route('tournaments.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return back()->with('notification', getTranslation('notification'));
    }
    public function statusUpdate(Tournament $tournament, string $status)
    {
        if (in_array($status, ['pending', 'ongoing', 'completed', 'canceled'])) {
            $tournament->update(['status' => $status]);
        }
        return back()->with('notification', getTranslation('notification'));
    }
}
