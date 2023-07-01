<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Funcion que redirecciona a la vista dashboard
    public function home()
    {
        return view('dashboard');
    }
}
