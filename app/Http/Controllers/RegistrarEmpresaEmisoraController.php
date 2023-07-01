<?php

namespace App\Http\Controllers;

use App\Models\EmpresaEmisora;
use Illuminate\Http\Request;

class RegistrarEmpresaEmisoraController extends Controller
{
    // Función que redirecciona a la vista de registrar empresa emisora
    public function index()
    {
        return view('forms.emisora');
    }

    // Función para registrar una empresa emisora
    public function store(Request $request)
    {
        // validar que se reciban los datos 
        // dd($request->all()); //si los recibe

        // Validación de campos
        $request->validate([
            'razon_social' => 'required|max:255',
            'correo_contacto' => 'required',
            'rfc_emisor' => 'required|max:13|min:12',
        ]);

        // Creación de la empresa emisora
        EmpresaEmisora::create([
            'razon_social' => $request->razon_social,
            'correo_contacto' => $request->correo_contacto,
            'rfc_emisor' => $request->rfc_emisor,
        ]);

        // Redirección a la vista de inicio
        return redirect('/');
    }
}
