<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccreditationCategoryStoreRequest;
use App\Models\AccreditationCategory;
use App\Traits\SearchColumTranslations;

class AccreditationCategoryController extends Controller
{
    protected $searhcModel = AccreditationCategory::class;
    protected $path = "accreditation-categories";

    use SearchColumTranslations;

    public function index()
    {
        $models = AccreditationCategory::orderByDesc('id')->paginate(10);
        return view(view: 'admin.accreditation-categories.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.accreditation-categories.create');
    }
    public function store(AccreditationCategoryStoreRequest $request)
    {
        $data = $request->all();

        $data['name']['default'] = reset($data['name']);

        $data['slug'] = slug($data['name']['default']);

        AccreditationCategory::create($data);

        return redirect()->route('accreditation-categories.index');
    }

    public function edit(AccreditationCategory $accreditation_category)
    {
        return view('admin.accreditation-categories.edit', ['category' => $accreditation_category]);
    }

    public function update(AccreditationCategoryStoreRequest $request, AccreditationCategory $accreditation_category)
    {
        $data = $request->all();
        $accreditation_category->update($data);

        return redirect()->route('accreditation-categories.index');
    }

    public function destroy(AccreditationCategory $accreditation_category)
    {
        $accreditation_category->delete();
        return redirect()->route('accreditation-categories.index');
    }
    public function status(AccreditationCategory $category)
    {
        $category->update(['is_active' => ! $category->is_active]);
        return back();
    }
}
