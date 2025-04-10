<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LanguageController extends Controller
{
    public function index()
    {
        $models = Language::with('histories')->orderBy('id', 'asc')->paginate(10);
        return view('admin.languages.index', ['models' => $models]);
    }
    public function search(Request $request)    
    {
        $query = Language::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['name', 'is_active']));

        return view('admin.languages.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request)
    {
        $data = $request->all();

        $data['slug'] = slug($data['name']);

        Language::create($data);

        Cache::forget('getLanguage');
        
        return redirect()->route('languages.index')->with('notification', getTranslation('notification'));
    }

    public function edit(Language $language)
    {
        return view('admin.languages.edit', ['model' => $language]);
    }
    public function show(Language $language)
    {
        return view('admin.languages.show', ['model' => $language]);
    }

    public function update(LanguageRequest $request, Language $language)
    {
        $data = $request->all();

        $language->update($data);
        
        Cache::forget('getLanguage');

        return redirect()->route('languages.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Language $language)
    {
        $language->delete();
        
        Cache::forget('getLanguage');

        return redirect()->route('languages.index')->with('notification', getTranslation('notification'));
    }
    public function status(Language $language)
    {
        $language->update(['is_active' => ! $language->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }
}
