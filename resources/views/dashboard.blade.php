@extends('layouts.app')

@section('title')
    Dashboard
@endsection


@section('content')
    <div class="my-auto mx-auto">
        {{-- Titulo de la sección --}}
        <h1 class="text-2xl font-medium mb-1 text-center text-black">Buscar factura</h1>
    </div>

    {{-- Contenedor global --}}
    <div class="flex justify-center my-10">


        {{-- Contenedorglobal --}}
        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-black shadow-sm">
            {{-- Formulario para la búsqueda de una factura --}}
            <form action="{{ route('buscar-factura') }}" method="POST">
                {{-- Directiva de seguridad --}}
                @csrf

                <div class="flex flex-col mb-4">
                    {{-- Campo Empresa emisora --}}
                    <label for="rfc_emisor" class="mb-2 font-bold text-lg text-grey-darkest">Empresa emisora</label>
                    <select name="rfc_emisor" id="rfc_emisor" class="border py-2 px-3 text-grey-darkest rounded-lg">
                        <option value="{{ old('rfc_emisor') }}">Selecciona una empresa emisora</option>
                        @if (isset($empresasEmisoras))
                            @foreach ($empresasEmisoras as $empresaEmisora)
                                <option value="{{ $empresaEmisora->id }}">{{ $empresaEmisora->razon_social }}</option>
                            @endforeach
                        @endif
                    </select>
                    {{-- Mensaje de error --}}
                    @error('rfc_emisor')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex flex-col mb-4">
                    {{-- Campo RFC RECEPTOR --}}
                    <label for="rfc_receptor" class="mb-2 font-bold text-lg text-grey-darkest">Empresa Receptor</label>
                    <select name="rfc_receptor" id="rfc_receptor" class="border py-2 px-3 text-grey-darkest rounded-lg">
                        <option value="">Selecciona un RFC receptor</option>
                        @if (isset($empresasReceptoras))
                            @foreach ($empresasReceptoras as $empresaReceptora)
                                <option value="{{ $empresaReceptora->id }}"
                                    {{ old('rfc_receptor') == $empresaReceptora->id ? 'selected' : '' }}>
                                    {{ $empresaReceptora->nombre }}</option>
                            @endforeach
                        @endif

                    </select>
                    {{-- Mensaje de error --}}
                    @error('rfc_receptor')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-4">
                    {{-- Campo Folio de factura --}}
                    <label for="folio_factura" class="mb-2 font-bold text-lg text-grey-darkest">Folio de factura</label>
                    <select name="folio_factura" id="folio_factura" class="border py-2 px-3 text-grey-darkest rounded-lg">
                        <option value="">Selecciona un folio</option>
                        @if (isset($facturas))
                            @foreach ($facturas as $factura)
                                <option value="{{ $factura->id }}"
                                    {{ old('folio_factura') == $factura->id ? 'selected' : '' }}>
                                    {{ $factura->folio_factura }}
                                </option>
                            @endforeach
                        @endif

                    </select>
                    {{-- Mensaje de error --}}
                    @error('folio_factura')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Boton de busqueda --}}
                <button type="submit"
                    class="bg-indigo-500 text-white px-4 py-3 rounded font-medium w-auto hover:text-black hover:bg-indigo-600 transition duration-500">Buscar</button>
            </form>
        </div>
    </div>

    {{-- ! Muestra la tabla de la factura buscada --}}
    @if (session('success'))
        <div class="alert alert-success">
            <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <h1 class="text-black text-sm lg:text-2xl text-center font-bold">Facura seleccionada</h1>
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg my-4">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Empresa Emisora
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Empresa Receptora
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Folio de Factura
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Archivo PDF
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Archivo XML
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Fecha de Creación
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($facturas as $factura)
                                {{-- ! Si el di de Factura que se encuentra en la tabla
                            ! es igual al id de la factura que se selecciono en el formulario    
                            ! muestra la tabla --}}
                                @if ($factura->id == session('success'))
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="flex items-center">
                                                <div>
                                                    <div class="text-sm leading-5 text-gray-800 text-center">
                                                        #{{ $factura->id }}
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
                                            class="px-6 py-4whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                            {{ $factura->empresaReceptora->nombre }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                            {{ $factura->folio_factura }}</td>

                                        <!-- Para el icono de PDF -->
                                        <td class="px-12 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900">
                                            @if ($factura->archivopdf)
                                                <a href="{{ asset('uploadspdf/' . $factura->archivopdf) }}"
                                                    target="_blank">
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
                                                <a href="{{ asset('uploadsxml/' . $factura->archivoxml) }}"
                                                    target="_blank">
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
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        {{-- ! Factura no encontrada --}}
        <div class="alert alert-danger">
            <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <h1 class="text-black text-sm lg:text-2xl text-center font-bold">Factura no encontrada</h1>
            </div>
        </div>
    @endif


@endsection
