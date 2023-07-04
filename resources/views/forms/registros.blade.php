@extends('dashboard')

@section('title')
    Reportes
@endsection

@section('content')
    @auth
        <h1 class="text-2xl font-bold mb-6 text-center">Reportes</h1>

        <h2>Empresas Emisoras</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razon social</th>
                    <th>Correo de contacto</th>
                    <th>RFC emisor</th>
                    <!-- Agrega aquí las columnas adicionales que deseas mostrar -->
                </tr>
            </thead>
            <tbody>
                @foreach ($empresasEmisoras as $empresaEmisora)
                    <tr>
                        <td>{{ $empresaEmisora->id }}</td>
                        <td>{{ $empresaEmisora->razonsocial }}</td>
                        <td>{{ $empresaEmisora->correo_contacto }}</td>
                        <td>{{ $empresaEmisora->rfc_emisor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Empresas Receptoras</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccón</th>
                    <th>RFC Receptor</th>
                    <th>Contacto</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresasReceptoras as $empresaReceptora)
                    <tr>
                        <td>{{ $empresaReceptora->id }}</td>
                        <td>{{ $empresaReceptora->nombre }}</td>
                        <td>{{ $empresaReceptora->direccion }}</td>
                        <td>{{ $empresaReceptora->rfc_receptor }}</td>
                        <td>{{ $empresaReceptora->contacto }}</td>
                        <td>{{ $empresaReceptora->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Facturas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa Emisora</th>
                    <th>Empresa Receptora</th>
                    <th>Folio Factura</th>
                    <th>Archivo PDF </th>
                    <th>Archivo XML </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->id }}</td>
                        <td>{{ $factura->empresaEmisora->razon_social }}</td>
                        <td>{{ $factura->empresaReceptora->nombre }}</td>
                        <td>{{ $factura->folio_factura }}</td>
                        <td>
                            @if ($factura->archivopdf)
                                <a href="{{ asset('uploadspdf/' . $factura->archivopdf) }}" target="_blank">PDF</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($factura->archivoxml)
                                <a href="{{ asset('uploadsxml/' . $factura->archivoxml) }}" target="_blank">XML</a>
                            @else
                                N/A
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    @endauth
@endsection
