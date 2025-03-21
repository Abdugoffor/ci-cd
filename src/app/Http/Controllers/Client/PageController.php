<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Menyu;
use App\Models\News;

class PageController extends Controller
{
    public function index(Menyu $page)
    {
        $news = News::where("menyu_id", $page->id)->orderBy('id', 'desc')->paginate(9);

        return view('client.page', ['news' => $news, 'page' => $page]);
    }

}
