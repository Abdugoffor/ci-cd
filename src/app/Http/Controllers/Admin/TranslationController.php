<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationRequest;
use App\Http\Requests\TranslationUpdateRequest;
use App\Models\Language;
use App\Models\Translation;

class TranslationController extends Controller
{
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
        $arrays = $this->validatedData($request->all());

        $arrays['slug'] = slug($request->default);

        Translation::create($arrays);

        return redirect()->route('translations.index');
    }

    public function edit(Translation $translation)
    {
        return view('admin.translations.edit', ['model' => $translation]);
    }

    public function update(TranslationUpdateRequest $request, Translation $translation)
    {
        $arrays = $this->validatedData($request->all());

        $translation->update($arrays);

        return redirect()->route('translations.index');
    }

    public function destroy(Translation $language)
    {
        $language->delete();
        return redirect()->route('translations.index');
    }

    public function validatedData($data)
    {
        $translation = getLanguage()->pluck(value: 'slug')->toArray();

        $arrays['default'] = $data['default'];

        $arrays['name'] = array_intersect_key($data, array_flip($translation));

        return $arrays;
    }

}
