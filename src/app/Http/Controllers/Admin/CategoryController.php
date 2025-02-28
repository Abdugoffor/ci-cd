<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Traits\SearchColumTranslations;

class CategoryController extends Controller
{
    protected $searhcModel = Category::class;
    protected $path = "categories";

    use SearchColumTranslations;
    public function index()
    {
        $models = Category::orderByDesc('id')->paginate(10);
        return view(view: 'admin.categories.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();

        $data['name']['default'] = reset($data['name']);

        $data['description']['default'] = reset($data['description']);

        $data['slug'] = slug($data['name']['default']);

        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function status(Category $category)
    {
        $category->update(['is_active' => ! $category->is_active]);
        return back();
    }

}
