<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;
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
        clock()->info($request->query());
        if ($request->query('areas') || $request->query('categories')) {
            $dishes = Dish::whereHas('store', function ($query, $request) {
                $areas = $request->query('areas');
                $query->where('mst_area_id', $areas);
            })->inRandomOrder()
                ->take(3)
                ->get();
        } else {
            $dishes = Dish::inRandomOrder()->take(3)->get();;
        }

        clock()->info($dishes);
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
        $url = 'https://graph.facebook.com/v11.0/' . $insta_media_id . '/media?access_token=' . $insta_access_token;
        $response = Http::get($url);

        $data = $response;

        return $data;
    }

    public function search(Request $request)
    {
        //TODO: リレーション先での検索　
        if ($request->query('areas') || $request->query('categories')) {
           
            $dishes = Dish::whereHas('store', function (Builder $query) {
                $query->where('mst_area_id', 1);
            })->get();
           
           
            // $dishes = Dish::whereHas('store', function (Builder $query) {
                // $areas = $request->query('areas');
                // $query->where('mst_area_id', 1);
            // })->get();
            // ->inRandomOrder()
                // ->take(3)
        }

        clock()->info($request->query('areas'));
        clock()->info($dishes);
        return $dishes;
    }
}
