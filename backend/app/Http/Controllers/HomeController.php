<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Dish;
use App\Models\MstArea;
use App\Models\MstCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->query('areas') || $request->query('categories')) {
            $dishes = Dish::whereHas('store', function($query, $request) {
                $areas = $request->query('areas');
                $query->where('mst_area_id', $areas);
            })->inRandomOrder()
            ->take(3)
            ->get();
        }else{
            $dishes = Dish::inRandomOrder()->take(3)->get();;
        }
        return $dishes;
    }

    public function area()
    {
        $areas = MstArea::all();

        return $areas;
    }

    public function category()
    {
        $areas = MstCategory::all();

        return $areas;
    }

    public function getData()
    {
        $insta_media_id = config('env.INSTA_MEDIA_ID');
        $insta_access_token = config('env.INSTA_ACCESS_TOKEN');
        $response = Http::get('https://graph.facebook.com/v11.0/{$insta_media_id}/media?fields=id,media_type,media_url&access_token={$ista_access_token}');

        $data = $response->json();

        return $data;
    }
}
