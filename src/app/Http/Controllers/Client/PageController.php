<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;

class PageController extends Controller
{
    public function index(int $page)
    {
        $page = News::where("menyu_id", $page)->first();

        if (! $page) {
            return abort(404);
        }

        $models = News::where('id', '!=', $page->id)
            ->where('is_active', true)
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        return view('client.page', ['page' => $page, 'models' => $models]);
    }

}
