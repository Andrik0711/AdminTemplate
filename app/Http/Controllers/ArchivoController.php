<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    // Método para almacenar el archivo en el servidor
    public function store(Request $request)
    {
        $archivo = $request->file('file');

        // // Validar que el archivo sea de tipo XML o PDF

        // // Generar un nombre único para cada archivo cargado en el servidor
        $nombreArchivo = Str::uuid() . '.' . $archivo->getClientOriginalExtension();

        // // Almacenar el archivo en la carpeta "uploads"
        $archivo->storeAs('uploads', $nombreArchivo);

        // // Obtener la ruta completa del archivo guardado
        $rutaArchivo = public_path('uploads') . '/' . $nombreArchivo;


        return response()->json(['archivo' => $nombreArchivo]);
        //return response()->json(['archivo' => 'Mensaje']);
    }
}
