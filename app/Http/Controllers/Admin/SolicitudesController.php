<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class SolicitudesController extends Controller{

    public function __construct() {
        $this->middleware('auth:admin');
    }


public function index(){
            return view('admin.pages.solicitudes.index');

}

}