@extends('dashboard')

@section('title')
    Emisora
@endsection

@section('content')
    @auth
        {{-- Formulario para el empresa emisora de factura --}}
        <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-6 text-center">Registrar empresa emisora</h1>

            {{-- Formulario de registro para empresa emisora --}}
            <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="{{ route('emisora.store') }}"
                method="POST" novalidate>
                {{-- Directiva de seguridad --}}
                @csrf
                {{-- Campo de razon social --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="razon_social">Razon social</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="razon_social" name="razon_social" placeholder="Ingresa tu razon social">

                    {{-- Mensaje de error --}}
                    @error('razon_social')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Campo de correo de contacto --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="correo_contacto">Correo de contacto</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="email" id="correo_contacto" name="correo_contacto" placeholder="andrik@gmail.com">
                    {{-- Mensaje de error --}}
                    @error('correo_contacto')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>

                {{-- Campo de RFC emisor --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rfc_emisor">RFC emiso</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" maxlength="12" id="rfc_emisor" name="rfc_emisor" placeholder="Ingresa el RFC">
                    {{-- Mensaje de error --}}
                    @error('rfc_emisor')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                </div>

                <button
                    class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                    type="submit">Registrar</button>
            </form>
        </div>
    @endauth
@endsection
