<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarEmpresaReceptoraController extends Controller
{
    // Función que redirecciona a la vista de registrar empresa receptora
    public function index()
    {
        return view('forms.receptora');
    }
}
