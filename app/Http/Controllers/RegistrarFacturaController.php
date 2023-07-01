<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarFacturaController extends Controller
{
    // Función que redirecciona a la vista de registrar factura
    public function index()
    {
        return view('forms.factura');
    }
}
