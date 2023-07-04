<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\EmpresaEmisora;
use App\Models\EmpresaReceptora;

class RegistrosController extends Controller
{
    // Función que redirecciona a la vista de registros se le pasan los datos de las tablas emisora, receptora y facturas
    public function index()
    {
        // Se obtienen todas las empresas emisoras
        $empresasEmisoras = EmpresaEmisora::all();

        // Se obtienen todas las empresas receptoras
        $empresasReceptoras = EmpresaReceptora::all();

        // Se obtienen todas las facturas
        $facturas = Factura::paginate(4);

        // Se mandan las empresas emisoras, receptoras y facturas a la vista de registros
        return view('forms.registros', compact('empresasEmisoras', 'empresasReceptoras', 'facturas'));
    }

    // Función que elimina una factura creada
    public function destroy($id)
    {
        $factura_id = Factura::find($id);

        if ($factura_id) {
            $factura_id->delete();

            // Se obtienen todas las empresas emisoras
            $empresasEmisoras = EmpresaEmisora::all();

            // Se obtienen todas las empresas receptoras
            $empresasReceptoras = EmpresaReceptora::all();

            // Se obtienen todas las facturas
            $facturas = Factura::paginate(4);
            return view('forms.registros', compact('empresasEmisoras', 'empresasReceptoras', 'facturas'));
        }
    }
}
