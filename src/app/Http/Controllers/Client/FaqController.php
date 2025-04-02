<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function all()
    {
        $models = Faq::where('is_active', true)->get();
        return view('client.faqs.all', ['models' => $models]);
    }
}
