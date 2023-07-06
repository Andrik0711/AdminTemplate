@extends('dashboard')

@section('title')
    Reportes
@endsection

@section('content')
    @auth
        <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">Lista de Reportes</h1>
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg my-4">
                {{-- Se muestran los datos de la tabla --}}
                <table class="min-w-full ">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Empresa Emisora</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Empresa Receptora</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Folio de Factura</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Archivo PDF</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Archivo XML</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                Fecha de Creación</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($facturas as $factura)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm leading-5 text-gray-800 text-center"># {{ $factura->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="text-sm leading-5 text-blue-900 text-center">
                                        {{ $factura->empresaEmisora->razon_social }}
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                    {{ $factura->empresaReceptora->nombre }}</td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                    {{ $factura->folio_factura }}</td>

                                <!-- Para el icono de PDF -->
                                <td class="px-12 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900">
                                    @if ($factura->archivopdf)
                                        <a href="{{ asset('uploadspdf/' . $factura->archivopdf) }}" target="_blank">
                                            <img src="{{ asset('images/svg/pdf-icon.svg') }}" alt="Icono de PDF"
                                                class="transition-transform duration-300 hover:scale-110">
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <!-- Para el icono de XML -->
                                <td class="px-12 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900">
                                    @if ($factura->archivoxml)
                                        <a href="{{ asset('uploadsxml/' . $factura->archivoxml) }}" target="_blank">
                                            <img src="{{ asset('images/svg/xml-icon.svg') }}" alt="Icono de XML"
                                                class="transition-transform duration-300 hover:scale-110">
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>


                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                    {{ $factura->created_at->format('d-m-Y') }}
                                </td>


                                <form action="{{ route('registros.destroy', $factura->id) }}" method="POST" id="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                        <button type="submit"
                                            class="eliminar-factura px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                                            Delete
                                        </button>
                                    </td>
                                </form>
                        @endforeach
                    </tbody>
                </table>

                {{-- Muestra la cantidad de archivos que hay en la tabla --}}
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-700">
                            Mostrando
                            <span class="font-medium">{{ $facturas->lastItem() }}</span>
                            de
                            <span class="font-medium">{{ $facturas->total() }}</span>
                            archivos
                        </p>
                    </div>
                </div>

                {{-- Paginacion de archivos --}}
                <div class="my-4 pagination flex justify-between hover:text-red-600">
                    <ul>
                        <!-- Botón "Anterior" -->
                        @if ($facturas->onFirstPage())
                            <li class="disabled"><span>&laquo; Anterior</span></li>
                        @else
                            <li><a href="{{ $facturas->previousPageUrl() }}" rel="prev">&laquo; Anterior</a></li>
                        @endif
                    </ul>


                    <ul>
                        <!-- Botón "Siguiente" -->
                        @if ($facturas->hasMorePages())
                            <li><a href="{{ $facturas->nextPageUrl() }}" rel="next">Siguiente &raquo;</a></li>
                        @else
                            <li class="disabled"><span>Siguiente &raquo;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endauth
@endsection
