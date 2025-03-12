<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index(News $currentNews)
    {
        $relatedNews = News::whereNotIn("id", [$currentNews->id])
            ->where('is_active', true)
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        return view('client.news', [
            'currentNews' => $currentNews,
            'relatedNews' => $relatedNews,
        ]);
    }

}
