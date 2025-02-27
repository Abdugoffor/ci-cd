<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $models = News::orderByDesc('id')->paginate(10);
        return view('admin.news.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(NewsStoreRequest $request)
    {
        $data = $request->all();

        News::create($data);

        return redirect()->route('news.index');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', ['category' => $news]);
    }

    public function update(NewsStoreRequest $request, News $news)
    {
        $data = $request->all();
        $news->update($data);

        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
