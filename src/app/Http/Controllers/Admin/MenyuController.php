<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenyuStoreRequest;
use App\Models\Menyu;
use App\Traits\SearchColumTranslations;
use Illuminate\Http\Request;

class MenyuController extends Controller
{
    protected $searhcModel = Menyu::class;
    protected $path        = "menus";

    use SearchColumTranslations;
    public function index()
    {
        $models = Menyu::orderByDesc('id')->paginate(10);
        return view(view: 'admin.menus.index', data: ['models' => $models]);
    }

    public function search(Request $request)
    {
        $query  = Menyu::query();
        $locale = app()->getLocale();

        if ($request->filled('name')) {
            $query->where("name->$locale", 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['name', 'is_active']));

        return view('admin.menus.index', ['models' => $models]);
    }

    public function create()
    {
        return view('admin.menus.create');
    }
    public function store(MenyuStoreRequest $request)
    {
        $data = $request->all();

        $data['name']['default'] = reset($data['name']);

        Menyu::create($data);

        return redirect()->route('menus.index')->with('notification', getTranslation('notification'));
    }

    public function show(Menyu $menu)
    {
        return view('admin.menus.show', ['model' => $menu]);
    }
    public function edit(Menyu $menu)
    {
        return view('admin.menus.edit', ['menu' => $menu]);
    }

    public function update(MenyuStoreRequest $request, Menyu $menu)
    {
        $data = $request->all();
        $menu->update($data);

        return redirect()->route('menus.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Menyu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('notification', getTranslation('notification'));
    }
    public function status(Menyu $menyu)
    {
        $menyu->update(['is_active' => ! $menyu->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }
}
