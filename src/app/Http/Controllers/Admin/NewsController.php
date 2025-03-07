<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\Menyu;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $models = News::orderByDesc('id')->paginate(10);
        $menus  = Menyu::all();
        return view('admin.news.index', data: ['models' => $models, 'menus' => $menus]);
    }
    public function search(Request $request)
    {
        $query  = News::query();
        $locale = app()->getLocale();

        if ($request->filled('title')) {
            $query->where("title->$locale", 'LIKE', "%{$request->title}%");
        }

        if ($request->filled('description')) {
            $query->where("description->$locale", 'LIKE', "%{$request->description}%");
        }

        if ($request->filled('text')) {
            $query->where("text->$locale", 'LIKE', "%{$request->text}%");
        }

        if ($request->filled('menyu_id')) {
            $query->where('menyu_id', $request->menyu_id);
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }


        $models = $query->paginate(10);
        $models->appends($request->only(['title', 'description', 'text', 'is_active']));

        $menus = Menyu::all();
        return view('admin.news.index', ['models' => $models, 'menus' => $menus]);
    }

    public function create()
    {
        $menus = Menyu::all();
        return view('admin.news.create', ['menus' => $menus]);
    }
    public function store(NewsStoreRequest $request)
    {
        $data = $request->all();

        $data['title']['default'] = reset($data['title']);

        $data['description']['default'] = reset($data['description']);

        $data['text']['default'] = reset($data['text']);

        if ($request->hasFile('photo')) {

            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;

        }

        News::create($data);

        return redirect()->route('news.index')->with('notification', getTranslation('notification'));
    }

    public function show(int $news)
    {
        $news  = News::findOrFail($news);
        return view('admin.news.show', ['model' => $news]);
    }
    public function edit(int $news)
    {
        $menus = Menyu::all();
        $news  = News::findOrFail($news);
        return view('admin.news.edit', ['news' => $news, 'menus' => $menus]);
    }

    public function update(NewsStoreRequest $request, int $news)
    {
        $data = $request->all();
        $news = News::findOrFail($news);

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        $news->update($data);

        return redirect()->route('news.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(int $news)
    {
        $news = News::findOrFail($news);
        $news->delete();

        return redirect()->route('news.index')->with('notification', getTranslation('notification'));
    }
    public function status(int $news)
    {
        $news = News::findOrFail($news);

        $news->update(['is_active' => ! $news->is_active]);

        return back()->with('notification', getTranslation('notification'));
    }
}
