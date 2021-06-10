<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
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
    public function show(Request $request)
    {
        $dishDetail = Dish::where('id', $request->dish_id)->get();

        return $dishDetail;
    }

    public function add(Request $request)
    {
        $dishDetail = Dish::where('id', $request->dish_id)->with('user_favorites')->first();

        if (!$dishDetail) {
            abort(404);
        }

        $dishDetail->favorites()->detach(Auth::user()->id);
        $dishDetail->favorites()->attach(Auth::user()->id);

        return ["dish_id" => $request->id];
    }

    public function remove(Request $request)
    {
        $dishDetail = Dish::where('id', $request->dish_id)->with('user_favorites')->first();

        if (!$dishDetail) {
            abort(404);
        }

        $dishDetail->favorites()->detach(Auth::user()->id);

        return ["dish_id" => $request->id];
    }
}
