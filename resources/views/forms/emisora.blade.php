@extends('dashboard')

@section('title')
    Emisora
@endsection

@section('content')
    @auth
        {{-- Formulario para el empresa emisora de factura --}}
        <div class="container mx-auto py-8">
            <div class="border border-transparent">
                <h1 class="text-2xl font-bold mb-6 text-center">Registrar empresa emisora</h1>
            </div>

            {{-- Formulario de registro para empresa emisora --}}
            <form class="w-full max-w-sm mx-auto my-auto bg-white p-8 rounded-md shadow-black shadow-sm"
                action="{{ route('emisora.store') }}" method="POST" novalidate>
                {{-- Directiva de seguridad --}}
                @csrf
                {{-- Campo de razon social --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="razon_social">Razon social</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="razon_social" name="razon_social" placeholder="Ingresa tu razon social"
                        value="{{ old('razon_social') }}">

                    {{-- Mensaje de error --}}
                    @error('razon_social')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Campo de correo de contacto --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="correo_contacto">Correo de contacto</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="email" id="correo_contacto" name="correo_contacto" placeholder="andrik@gmail.com"
                        value="{{ old('correo_contacto') }}">
                    {{-- Mensaje de error --}}
                    @error('correo_contacto')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>

                {{-- Campo de RFC emisor --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rfc_emisor">RFC emiso</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" minlength="12" maxlength="13" id="rfc_emisor" name="rfc_emisor"
                        placeholder="Ingresa el RFC" value="{{ old('rfc_emisor') }}">
                    {{-- Mensaje de error --}}
                    @error('rfc_emisor')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>

                <button
                    class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 hover:text-black transition duration-500"
                    type="submit">Registrar</button>
            </form>
        </div>


        {{-- Tabla de empresas emisoras --}}
        @if ($empresasEmisoras)
            <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">Listado de Empresas Emisoras</h1>
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg my-4">
                    {{-- Se muestran los datos de la tabla --}}
                    <table class="min-w-full ">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Razón Social</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Correo de Contacto</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    RFC emisor</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Fecha de Creación</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($empresasEmisoras as $empresa_emisora)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800 text-center">#
                                                    {{ $empresa_emisora->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="text-sm leading-5 text-blue-900 text-center">
                                            {{ $empresa_emisora->razon_social }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresa_emisora->correo_contacto }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresa_emisora->rfc_emisor }}</td>


                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                        {{ $empresa_emisora->created_at->format('d-m-Y') }}
                                    </td>


                                    <form action="{{ route('emisora.destroy', $empresa_emisora->id) }}" method="POST"
                                        id="form-delete">
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
                                <span class="font-medium">{{ $empresasEmisoras->lastItem() }}</span>
                                de
                                <span class="font-medium">{{ $empresasEmisoras->total() }}</span>
                                empresas emisoras
                            </p>
                        </div>
                    </div>

                    <div class="my-4 pagination flex justify-between hover:text-red-600">
                        <ul>
                            <!-- Botón "Anterior" -->
                            @if ($empresasEmisoras->onFirstPage())
                                <li class="disabled"><span>&laquo; Anterior</span></li>
                            @else
                                <li><a href="{{ $empresasEmisoras->previousPageUrl() }}" rel="prev">&laquo; Anterior</a>
                                </li>
                            @endif
                        </ul>

                        <ul>
                            <!-- Botón "Siguiente" -->
                            @if ($empresasEmisoras->hasMorePages())
                                <li><a href="{{ $empresasEmisoras->nextPageUrl() }}" rel="next">Siguiente &raquo;</a></li>
                            @else
                                <li class="disabled"><span>Siguiente &raquo;</span></li>
                            @endif
                        </ul>
                    </div>


                </div>
            </div>
        @else
            <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">No hay Empresas Emisoras</h1>
        @endif
    @endauth
@endsection
