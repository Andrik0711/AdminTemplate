<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarEmpresaEmisoraController extends Controller
{
    // Función que redirecciona a la vista de registrar empresa emisora
    public function index()
    {
        return view('forms.emisora');
    }
}
