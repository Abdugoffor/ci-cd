<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;
use App\Http\Requests\TranslationUpdateRequest;
use App\Models\Language;
use App\Models\Translation;
use App\Traits\SearchColumTranslations;

class TranslationController extends Controller
{
    protected $searhcModel = Translation::class;
    protected $path = "translations";

    use SearchColumTranslations;
    public function index()
    {
        $models = Translation::orderByDesc('id')->paginate(10);
        return view('admin.translations.index', data: ['models' => $models]);
    }
    public function create()
    {
        $models = Language::all();
        return view('admin.translations.create', ['models' => $models]);
    }
    public function store(TranslationRequest $request)
    {
        $data = $request->all();

        $data['slug'] = slug($request->default);

        Translation::create($data);

        return redirect()->route('translations.index');
    }

    public function edit(Translation $translation)
    {
        return view('admin.translations.edit', ['model' => $translation]);
    }

    public function update(TranslationUpdateRequest $request, Translation $translation)
    {
        $data = $request->all();

        $translation->update($data);

        cacheClear($translation->slug);

        return redirect()->route('translations.index');
    }

    public function destroy(Translation $translation)
    {
        cacheClear($translation->slug);
        $translation->delete();
        return redirect()->route('translations.index');
    }

}
