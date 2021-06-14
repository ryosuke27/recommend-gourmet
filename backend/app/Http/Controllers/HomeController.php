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
    public function index()
    {

        $dishes = Dish::inRandomOrder()->take(3)->get();;
// phpinfo();
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

    public function search(Request $request)
    {
        dd($request->all());
        $result = Dish::where("store_id", $request->store_id);

        return $result;
    }
}
