<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccreditationCategoryStoreRequest;
use App\Models\AccreditationCategory;
use Illuminate\Http\Request;

class AccreditationCategoryController extends Controller
{
    public function index()
    {
        $models = AccreditationCategory::orderByDesc('id')->paginate(10);
        return view('admin.accreditation-categories.index', ['models' => $models]);
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        $is_active = $request->input('is_active');

        $query = AccreditationCategory::query();

        if (! empty($name)) {
            $query->where("name->" . app()->getLocale(), 'LIKE', "%{$name}%");
        }

        if ($is_active !== null && $is_active !== '') {
            $query->where('is_active', filter_var($is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);

        $models->appends($request->only('name', 'is_active'));

        return view('admin.accreditation-categories.index', ['models' => $models]);
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

        return redirect()->route('accreditation-categories.index')->with('notification', getTranslation('notification'));
    }

    public function edit(AccreditationCategory $accreditation_category)
    {
        return view('admin.accreditation-categories.edit', ['category' => $accreditation_category]);
    }
    public function show(AccreditationCategory $accreditation_category)
    {
        return view('admin.accreditation-categories.show', ['model' => $accreditation_category]);
    }

    public function update(AccreditationCategoryStoreRequest $request, AccreditationCategory $accreditation_category)
    {
        $data = $request->all();
        $accreditation_category->update($data);

        return redirect()->route('accreditation-categories.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(AccreditationCategory $accreditation_category)
    {
        $accreditation_category->delete();
        return redirect()->route('accreditation-categories.index')->with('notification', getTranslation('notification'));
    }
    public function status(AccreditationCategory $category)
    {
        $category->update(['is_active' => ! $category->is_active]);
        return back()->with('notification',getTranslation('notification'));
    }
}
