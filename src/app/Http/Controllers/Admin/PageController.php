<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $models = Page::orderByDesc('id')->paginate(10);

        return view('admin.pages.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query  = Page::query();
        $locale = app()->getLocale();

        if ($request->filled('title')) {
            $query->where("title->$locale", 'LIKE', "%{$request->title}%");
        }

        if ($request->filled('url')) {
            $query->where('url', 'LIKE', "%{$request->url}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['title', 'description', 'is_active']));

        return view('admin.pages.index', ['models' => $models]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }
    public function store(PageStoreRequest $request)
    {
        $data = $request->all();

        $data['title']['default'] = reset($data['title']);

        $data['description']['default'] = reset($data['description']);

        $data['text']['default'] = reset($data['text']);

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        Page::create($data);

        return redirect()->route('pages.index')->with('notification', getTranslation('notification'));
    }

    public function show(int $pages)
    {
        $pages = Page::findOrFail($pages);
        return view('admin.pages.show', ['model' => $pages]);
    }
    public function edit(int $pages)
    {
        $pages = Page::findOrFail($pages);
        return view('admin.pages.edit', ['pages' => $pages]);
    }

    public function update(PageUpdateRequest $request, int $pages)
    {
        $data  = $request->all();
        $pages = Page::findOrFail($pages);

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $pages->update($data);

        return redirect()->route('pages.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(int $pages)
    {
        $pages = Page::findOrFail($pages);
        $pages->delete();

        return redirect()->route('pages.index')->with('notification', getTranslation('notification'));
    }
    public function status(int $pages)
    {
        $pages = Page::findOrFail($pages);

        $pages->update(['is_active' => ! $pages->is_active]);

        return back()->with('notification', getTranslation('notification'));
    }
}
