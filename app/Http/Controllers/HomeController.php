<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function notices()
    {
        return view('pages.notices');
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function events()
    {
        return view('pages.events');
    }

    public function gallerys()
    {
        return view('pages.gallerys');
    }

    public function videos()
    {
        return view('pages.videos');
    }
}
