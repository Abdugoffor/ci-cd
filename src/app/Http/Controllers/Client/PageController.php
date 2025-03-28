<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Menyu;
use App\Models\News;
use App\Models\Page;

class PageController extends Controller
{
    public function index(Page $content)
    {
        return view('client.page', ['page' => $content]);
    }

}
