<?php

namespace App\Http\Controllers;

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
    public function show($id)
    {

        $favorites = UserFavorite::find('user_id', $id);

        return view('favorite', [
            "favorites" => $favorites,
        ]);
    }
}
