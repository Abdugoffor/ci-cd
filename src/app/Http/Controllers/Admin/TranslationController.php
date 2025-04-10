<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;
use App\Http\Requests\TranslationUpdateRequest;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $models = Translation::with('histories')->orderByDesc('id')->paginate(10);
        return view('admin.translations.index', data: ['models' => $models]);
    }

    public function search(Request $request)
    {
        $query = Translation::query();

        $locale = app()->getLocale();

        if ($request->filled('name')) {
            $query->where("name->$locale", 'LIKE', "%{$request->name}%");
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['name']));

        return view('admin.translations.index', ['models' => $models]);
    }

    public function create()
    {
        $models = Language::all();
        return view('admin.translations.create', ['models' => $models]);
    }
    public function store(TranslationRequest $request)
    {
        $data = $request->all();

        $data['slug']            = slug($request->default);
        $data['name']['default'] = $request->default;

        Translation::create($data);

        return redirect()->route('translations.index')->with('notification', getTranslation('notification'));
    }

    public function edit(Translation $translation)
    {
        return view('admin.translations.edit', ['model' => $translation]);
    }
    public function show(Translation $translation)
    {
        return view('admin.translations.show', ['model' => $translation]);
    }

    public function update(TranslationUpdateRequest $request, Translation $translation)
    {
        $data                    = $request->all();
        $data['name']['default'] = $request->default;
        $translation->update($data);

        cacheClear($translation->slug);

        return redirect()->route('translations.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Translation $translation)
    {
        cacheClear($translation->slug);
        $translation->delete();
        return redirect()->route('translations.index')->with('notification', getTranslation('notification'));
    }

}
