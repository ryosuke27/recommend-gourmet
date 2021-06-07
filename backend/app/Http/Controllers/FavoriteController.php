<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
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

        foreach ($favorites as $key => $favorite)
        {
            $dishes[$key]['id'] = $favorite->dish->id;
            $dishes[$key]['name'] = $favorite->dish->name;
            $dishes[$key]['description'] = $favorite->dish->description;
            $dishes[$key]['image_path'] = $favorite->dish->image_path;
        }
        
        return $dishes;
    }
}
