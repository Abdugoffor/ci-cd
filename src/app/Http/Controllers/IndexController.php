<?php
namespace App\Http\Controllers;

use App\Models\Tournament;

class IndexController extends Controller
{
    public function index()
    {
        $models = Tournament::where('status', 'pending')->get();
        return view('index', ['models' => $models]);
    }
    public function application(Tournament $application)
    {
        if ($application->status == 'pending') {
            return view('applications.application', ['application' => $application]);
        }
        return redirect('/');
    }


}
