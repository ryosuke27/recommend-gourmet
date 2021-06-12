<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\UserFavorite;

class FavoriteController extends Controller
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
    public function show()
    {

        $favorites = UserFavorite::where('user_id', Auth::user()->id)->get();
        //TODO : 同じ料理の重複をなくす
        $dishes = array();

        foreach ($favorites as $key => $favorite) {
            $dishes[$key]['id'] = $favorite->dish->id;
            $dishes[$key]['name'] = $favorite->dish->name;
            $dishes[$key]['description'] = $favorite->dish->description;
            $dishes[$key]['image_path'] = $favorite->dish->image_path;
        }

        return $dishes;
    }

    /**
     * add Favorite.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request)
    {

        $dish = Dish::where('id', $request->dish_id)->with('favorites')->first();

        if (!$dish) {
            abort(404);
        }

        $dish->favorites()->detach(Auth::user()->id);
        $dish->favorites()->attach(Auth::user()->id);

        return ["dish_id" => $request->dish_id];
    }

    /**
     * delete Favorite.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {

        $dish = Dish::where('id', $request->dish_id)->with('favorites')->first();

        if (!$dish) {
            abort(404);
        }

        $dish->favorites()->detach(Auth::user()->id);

        return ["dish_id" => $request->dish_id];
    }
}
