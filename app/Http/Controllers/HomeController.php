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

    // we add middleware to prevent non-registered users to load the user home page
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     // returns view home
    public function index()
    {
        return view('home')->with([
            'title' => 'Home'
        ]);
    }
}
