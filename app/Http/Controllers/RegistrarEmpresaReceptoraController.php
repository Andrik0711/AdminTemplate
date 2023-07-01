<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaReceptora;

class RegistrarEmpresaReceptoraController extends Controller
{
    // Función que redirecciona a la vista de registrar empresa receptora
    public function index()
    {
        return view('forms.receptora');
    }

    // Función para registrar una empresa receptora
    public function store(Request $request)
    {
        // validar que se reciban los datos 
        // dd($request->all()); //si los recibe

        // Validación de campos
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required',
            'rfc_receptor' => 'required|max:13|min:12',
            'contacto' => 'required',
            'email' => 'required',
        ]);

        // Creación de la empresa receptora
        EmpresaReceptora::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'rfc_receptor' => $request->rfc_receptor,
            'contacto' => $request->contacto,
            'email' => $request->email,
        ]);

        // Redirección a la vista de inicio
        return redirect('/');
    }
}
