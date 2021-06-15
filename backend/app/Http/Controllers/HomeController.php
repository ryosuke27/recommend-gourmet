<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                $categories = $request->query('categories'); 
                $query->where('mst_area_id', $areas)
                      ->where('mst_category_id', $categories);
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
}
