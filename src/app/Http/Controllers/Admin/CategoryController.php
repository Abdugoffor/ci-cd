<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $models = Category::paginate(10);
        return view('admin.categories.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();

        $data['slug'] = slug($data['default']);

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
