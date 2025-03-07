<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $models = Category::orderByDesc('id')->paginate(10);
        return view('admin.categories.index', ['models' => $models]);
    }

    public function search(Request $request)
    {
        $query = Category::query();

        if ($request->filled('name')) {
            $query->where("name->" . app()->getLocale(), 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('description')) {
            $query->where("description->" . app()->getLocale(), 'LIKE', "%{$request->description}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['name', 'description', 'is_active']));

        return view('admin.categories.index', ['models' => $models]);
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

        return redirect()->route('categories.index')->with('notification', getTranslation('notification'));
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['model' => $category]);
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);

        return redirect()->route('categories.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function status(Category $category)
    {
        $category->update(['is_active' => ! $category->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }

}
