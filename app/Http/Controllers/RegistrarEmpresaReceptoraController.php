<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaReceptora;

class RegistrarEmpresaReceptoraController extends Controller
{
    // Función que redirecciona a la vista de registrar empresa receptora
    public function index()
    {
        // Pasamos todas las empresas receptoras que se tengan
        $empresasReceptoras = EmpresaReceptora::paginate(4);

        // dd('hola');  Si entra a la función
        return view('forms.receptora', compact('empresasReceptoras'));
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
            'rfc_receptor' => 'required|max:13|min:12|unique:empresa_receptora,rfc_receptor',
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
        return redirect('receptora');
    }

    // Función para eliminar una empresa receptora
    public function destroy($id)
    {
        // Buscamos la empresa receptora a eliminar
        $empresaReceptora = EmpresaReceptora::find($id);

        if ($empresaReceptora) {
            // Eliminamos la empresa receptora y sus facturas asociadas
            $empresaReceptora->delete();

            // Redirección a la vista de inicio
            return redirect('receptora')->with('success', 'Empresa receptora eliminada exitosamente.');
        }

        // Redirección en caso de no encontrar la empresa receptora
        return redirect('receptora')->with('error', 'No se encontró la empresa receptora.');
    }
}
