@extends('dashboard')

@section('content')
    @auth
        {{-- Formulario para la empresa receptora de la factura 
        con los siguienres campos:
- id
- Nombre
- Dirección
- RFC 
- Contacto
- Email
        --}}
        <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-6 text-center">Registrar empresa receptora</h1>

            {{-- Formulario de registro para empresa emisora --}}
            <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
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

                {{-- Campo contacto telefono --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contacto">Contacto</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="number" id="contacto" name="contacto" placeholder="Ingresa el contacto">
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
                    class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                    type="submit">Registrar</button>
            </form>
        </div>
    @endauth
@endsection
