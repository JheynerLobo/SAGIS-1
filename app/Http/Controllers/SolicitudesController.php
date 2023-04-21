<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


class SolicitudesController extends Controller{

    public function __construct(){
        $this->middleware('auth:web');
    }


public function index(){
        return view('pages.solicitudes.index');
}
}