<?php
namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Tournament;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index()
    {
        $models = Tournament::where('status', 'pending')->get();
        return view('index', ['models' => $models]);
    }
    public function application(Tournament $application)
    {
        // dd($application);
        // $url = "https://api.fide.com/regform/1503014";

        // try {
        //     $response = Http::get($url);
        //     $data     = $response->body();

        //     $decodedData = json_decode($data, true);

        //     if (! empty($decodedData) && is_array($decodedData)) {
        //         $player = $decodedData[0];
        //         // dd($player);
        //         $fide_id        = $player['id_number'];
        //         $name           = $player['name'];
        //         $country        = $player['country'];
        //         $gender         = $player['sex'];
        //         $birthYear      = $player['birthyear'];
        //         $title          = $player['title'];
        //         $standardRating = $player['standard_rating'];
        //         $blitzRating    = $player['blitz_rating'];
        //         $rapidRating    = $player['rapid_rating'];
        //         $imageFile      = $player['image_file'];

        //     } else {
        //         return response()->json([
        //             'status'  => 'fail',
        //             'message' => 'Ma’lumot topilmadi yoki noto‘g‘ri formatda',
        //         ], 404);
        //     }
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status'  => 'fail',
        //         'message' => 'So‘rov yuborishda xatolik yuz berdi',
        //         'error'   => $e->getMessage(),
        //     ], 500);
        // }3 878 994,00

        if ($application->status == 'pending') {
            return view('applications.application', ['application' => $application]);
        }
        return redirect('/');
    }
    public function changeLanguage($lang)
    {
        $lang = Language::where('slug', $lang)->where('is_active', true)->first();

        if ($lang) {

            session()->put('lang', $lang->slug);

            App::setLocale($lang->slug);
        }
        return back();
    }

}
