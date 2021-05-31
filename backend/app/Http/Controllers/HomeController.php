<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {

        $embed_html = '<iframe src="'.url('/image/test1.jpg/?embed').'" style="width:100%;height:100%; border:none;"></iframe>';

        return view('index', [
            "embed_html" => $embed_html
        ]);
    }
}
