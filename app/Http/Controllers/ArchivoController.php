<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    // Método para almacenar el archivo pdf en el servidor
    public function storepdf(Request $request)
    {
        $archivopdf = $request->file('file');

        // Generar un nombre único para cada archivo cargado en el servidor
        $nombreArchivo = Str::uuid() . '.' . $archivopdf->getClientOriginalExtension();

        // Almacenar el archivo en la carpeta "uploads"
        $archivopdf->storeAs('uploadspdf', $nombreArchivo, 'public');

        // Obtener la ruta completa del archivo guardado
        $rutaArchivo = public_path('uploadspdf') . '/' . $nombreArchivo;

        return response()->json(['archivopdf' => $nombreArchivo]);
    }

    // Método para almacenar el archivo xml en el servidor
    public function storexml(Request $request)
    {
        $archivoxml = $request->file('file');

        // Generar un nombre único para cada archivo cargado en el servidor
        $nombreArchivo = Str::uuid() . '.' . $archivoxml->getClientOriginalExtension();

        // Almacenar el archivo en la carpeta "uploadsxml"
        $archivoxml->storeAs('uploadsxml', $nombreArchivo, 'public');

        // Obtener la ruta completa del archivo guardado
        $rutaArchivo = public_path('uploadsxml') . '/' . $nombreArchivo;

        return response()->json(['archivoxml' => $nombreArchivo]);
    }
}
