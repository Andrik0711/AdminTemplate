@extends('dashboard')

@section('title')
    Receptora
@endsection

@section('content')
    @auth
        <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-6 text-center">Registrar empresa receptora</h1>

            {{-- Formulario de registro para empresa emisora --}}
            <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-sm shadow-black"
                action="{{ route('receptora.store') }}" method="POST" novalidate>
                {{-- Directiva de seguridad --}}
                @csrf
                {{-- Campo de nombre --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre de la empresa </label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre de la empresa">

                    {{-- Mensaje de error --}}
                    @error('nombre')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Campo de direccion --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="direccion" name="direccion" placeholder="Ingresa la dirección">

                    {{-- Mensaje de error --}}
                    @error('direccion')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Campo de RFC recepetor --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rfc_receptor">RFC receptor</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" maxlength="12" id="rfc_receptor" name="rfc_receptor" placeholder="Ingresa el RFC">
                    {{-- Mensaje de error --}}
                    @error('rfc_receptor')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Campo contacto --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contacto">Contacto</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="contacto" name="contacto" placeholder="Ingresa el contacto">
                    {{-- Mensaje de error --}}
                    @error('contacto')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                {{-- Campo de email de contacto --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email de contacto</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="email" id="email" name="email" placeholder="Ingresa el email">
                    {{-- Mensaje de error --}}
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                    {{-- boton de registro --}}
                </div>
                <button
                    class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:text-black hover:bg-indigo-600 transition duration-300"
                    type="submit">Registrar</button>
            </form>
        </div>

        @if ($empresasReceptoras)
            {{-- Tabla de empresas receptoras --}}
            <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">Lista de Empresas Receptoras</h1>
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
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Dirección</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    RFC Receptor</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Contacto</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Email de contacto</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Fecha de Creación</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($empresasReceptoras as $empresasReceptora)
                                <tr>
                                    {{-- ! ID --}}
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800 text-center">#
                                                    {{ $empresasReceptora->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- ! Nombre --}}
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="text-sm leading-5 text-blue-900 text-center">
                                            {{ $empresasReceptora->nombre }}
                                        </div>
                                    </td>

                                    {{-- ! Direccion --}}
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresasReceptora->direccion }}</td>

                                    {{-- ! RFC RECEPTOR --}}
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresasReceptora->rfc_receptor }}</td>

                                    {{-- ! Contacto --}}
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresasReceptora->contacto }}</td>

                                    {{-- ! Email de contacto --}}
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-center">
                                        {{ $empresasReceptora->email }}</td>

                                    {{-- ! Fecha de creacion --}}
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5 text-center">
                                        {{ $empresasReceptora->created_at->format('d-m-Y') }}
                                    </td>


                                    {{-- ! Boton de eliminar --}}
                                    <form action="{{ route('receptora.destroy', $empresasReceptora->id) }}" method="POST"
                                        id="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                            <button type="submit"
                                                class="eliminar-receptora px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
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
                                <span class="font-medium">{{ $empresasReceptoras->lastItem() }}</span>
                                de
                                <span class="font-medium">{{ $empresasReceptoras->total() }}</span>
                                empresas receptoras
                            </p>
                        </div>
                    </div>

                    <div class="my-4 pagination flex justify-between hover:text-red-600">
                        <ul>
                            <!-- Botón "Anterior" -->
                            @if ($empresasReceptoras->onFirstPage())
                                <li class="disabled"><span>&laquo; Anterior</span></li>
                            @else
                                <li><a href="{{ $empresasReceptoras->previousPageUrl() }}" rel="prev">&laquo; Anterior</a>
                                </li>
                            @endif
                        </ul>

                        <ul>
                            <!-- Botón "Siguiente" -->
                            @if ($empresasReceptoras->hasMorePages())
                                <li><a href="{{ $empresasReceptoras->nextPageUrl() }}" rel="next">Siguiente &raquo;</a>
                                </li>
                            @else
                                <li class="disabled"><span>Siguiente &raquo;</span></li>
                            @endif
                        </ul>
                    </div>


                </div>
            </div>
        @else
            <h1 class=" text-black text-sm lg:text-2xl text-center font-bold">No hay Empresas Receptoras</h1>
        @endif
    @endauth
@endsection
