<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AfertaStoreRequest;
use App\Models\Aferta;
use Illuminate\Http\Request;

class AfertaController extends Controller
{
    public function index()
    {
        $models = Aferta::orderByDesc('id')->paginate(10);
        return view('admin.afertas.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query = Aferta::query();

        $locale = app()->getLocale();

        if ($request->filled('text')) {
            $query->where("text->$locale", 'LIKE', "%{$request->title}%");
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['text']));

        return view('admin.afertas.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.afertas.create');
    }
    public function store(AfertaStoreRequest $request)
    {
        $data = $request->all();

        $data['text']['default'] = reset($data['text']);

        Aferta::create($data);

        return redirect()->route('aferta.index')->with('notification', getTranslation('notification'));
    }

    public function show(Aferta $afertum)
    {
        return view('admin.afertas.show', ['model' => $afertum]);
    }

    public function edit(Aferta $afertum)
    {
        return view('admin.afertas.edit', ['aferta' => $afertum]);
    }

    public function update(AfertaStoreRequest $request, Aferta $afertum)
    {
        $data = $request->all();

        $afertum->update($data);

        return redirect()->route('aferta.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Aferta $afertum)
    {
        $afertum->delete();
        return redirect()->route('aferta.index')->with('notification', getTranslation('notification'));
    }
}
