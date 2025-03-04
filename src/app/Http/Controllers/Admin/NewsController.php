<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\Menyu;
use App\Models\News;
use App\Traits\SearchColumTranslations;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected $searhcModel = News::class;
    protected $path        = "news";

    use SearchColumTranslations;
    public function index()
    {
        $models = News::orderByDesc('id')->paginate(10);
        $menus  = Menyu::all();
        return view('admin.news.index', data: ['models' => $models, 'menus' => $menus]);
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
            try {
                $file       = $request->file('photo');
                $extensions = $file->getClientOriginalExtension();
                $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
                $file->move(public_path('uploaded'), $filename);
                $data['photo'] = 'uploaded/' . $filename;
            } catch (\Exception $e) {
                Log::error('Fayl yuklashda xatolik: ' . $e->getMessage(), [
                    'file' => $request->file('photo')->getClientOriginalName(),
                    'size' => $request->file('photo')->getSize(),
                    'path' => public_path('uploaded'),
                ]);
                // return redirect()->back()->withErrors(['photo' => 'Fayl yuklashda xatolik: ' . $e->getMessage()]);
            }
        }

        News::create($data);

        return redirect()->route('news.index');
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

        return redirect()->route('news.index');
    }

    public function destroy(int $news)
    {
        $news = News::findOrFail($news);
        $news->delete();

        return redirect()->route('news.index');
    }
    public function status(int $news)
    {
        $news = News::findOrFail($news);

        $news->update(['is_active' => ! $news->is_active]);

        return back();
    }
}
