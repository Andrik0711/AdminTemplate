@extends('dashboard')

@section('title')
    Reportes
@endsection

@section('content')
    @auth
        <h1 class="text-2xl font-bold mb-6 text-center">
            Reportes</h1>

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




        <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">Lista de Reportes</h1>
            {{-- ! Filtro de busqueda --}}
            {{-- <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white  px-12">
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                <span
                                    class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                    <img src="{{ asset('images/svg/search.svg') }}" alt="Icono de busqueda">
                                </span>
                            </div>
                            <input type="text"
                                class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-base text-gray-500 font-thin"
                                placeholder="Ingresa el nombre de la Empresa Emisora">
                        </div>
                    </div>
                </div>
            </div> --}}

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

@push('script')
    <script>
        // Obtener una referencia a todos los botones "Delete" con la clase "eliminar-factura"
        const botonesEliminar = document.querySelectorAll('.eliminar-factura');

        // Agregar un evento de clic a cada botón
        botonesEliminar.forEach(boton => {
            boton.addEventListener('click', () => {
                // Obtener el ID de la factura desde el atributo "data-id" del botón
                const facturaId = boton.getAttribute('data-id');

                // Confirmar la eliminación con el usuario
                if (confirm('¿Estás seguro de que deseas eliminar esta factura?')) {
                    // Hacer una solicitud al servidor para eliminar la factura
                    fetch(`/eliminar-factura/${facturaId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Eliminar la fila de la factura de la tabla o realizar cualquier otra acción necesaria
                                boton.closest('tr').remove();
                                alert('Factura eliminada exitosamente');
                            } else {
                                alert(
                                    'No se pudo eliminar la factura. Por favor, inténtalo nuevamente.'
                                );
                            }
                        })
                        .catch(error => console.error('Error al eliminar la factura', error));
                }
            });
        });
    </script>
@endpush
