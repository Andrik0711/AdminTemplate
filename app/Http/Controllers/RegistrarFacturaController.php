<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\EmpresaEmisora;
use App\Models\EmpresaReceptora;

class RegistrarFacturaController extends Controller
{
    // Función que redirecciona a la vista de registrar factura
    public function index()
    {
        // Se obtienen todas las empresas emisoras
        $empresasEmisoras = EmpresaEmisora::all();

        // Se obtienen todas las empresas receptoras
        $empresasReceptoras = EmpresaReceptora::all();

        //Verificar que si hay datos
        // dd($empresasEmisoras);

        // Se mandan las empresas emisoras a la vista de registrar factura
        return view('forms.factura', compact('empresasEmisoras'), compact('empresasReceptoras'));
    }

    // Función que guarda una factura
    public function store(Request $request)
    {

        // dd($request->all()); // recibe el archivo como NULL eso se debe que no jala bien el dropzone

        $request->validate([
            'empresa_emisora' => 'required',
            'rfc_receptor' => 'required',
            'folio_factura' => 'required',
            'archivo' => 'required',
        ]);

        // Creamos la factura
        Factura::create([
            'empresa_emisora_id' => $request->empresa_emisora,
            'empresa_receptora_id' => $request->rfc_receptor, // Corrige el nombre del campo aquí
            'folio_factura' => $request->folio_factura,
            'archivo' => $request->archivo,
        ]);

        // Se redirecciona a la vista de registrar factura
        return redirect('/');
    }
}
