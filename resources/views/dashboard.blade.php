@extends('layouts.app')

@section('title')
    Dashboard
@endsection


@section('content')
    {{-- Contenedor global --}}
    <div class="flex justify-center my-10">
        {{-- Contenedor del formulario --}}
        <div class=" md:w-1/2 bg-white p-6 rounded-lg shadow-black shadow-sm ">
            {{-- Formulario para la busqueda de una factura 
                    Usamos los campos siguientes para hacer la busqueda de una factura
                    ! RFC EMISOR
                    ! RFC RECEPTOR
                    ! Folio de factura
                    --}}

            <form action="#" method="#">
                {{-- Directiva de seguridad --}}
                @csrf


                <div class="flex flex-col mb-4">
                    {{-- Campo Empresa emisora --}}
                    <label for="empresa_emisora" class="mb-2 font-bold text-lg text-grey-darkest">Empresa
                        emisora</label>
                    <input type="text" name="empresa_emisora" id="empresa_emisora" placeholder="RFC EMISOR"
                        class="border py-2 px-3 text-grey-darkest rounded-lg ">
                    {{-- Mensaje de error --}}
                    @error('empresa_emisora')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex flex-col mb-4">
                    {{-- Campo RFC RECEPTOR --}}
                    <label for="rfc_receptor" class="mb-2 font-bold text-lg text-grey-darkest">RFC
                        Receptor</label>
                    <input type="text" name="rfc_receptor" id="rfc_receptor" placeholder="RFC RECEPTOR"
                        class="border py-2 px-3 text-grey-darkest rounded-lg">
                    {{-- Mensaje de error --}}
                    @error('rfc_receptor')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror

                </div>


                <div class="flex flex-col mb-4">
                    {{-- Campo razon social receptor --}}
                    <label for="razon_social" class="mb-2 font-bold text-lg text-grey-darkest">Razón social
                        *(Receptor) </label>
                    <input type="text" name="razon_social" id="razon_social" placeholder="Razon social"
                        class="border py-2 px-3 text-grey-darkest rounded-lg">
                    {{-- Mensaje de error --}}
                    @error('razon_social')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex flex-col mb-4">
                    {{-- Campo Folio de factura --}}
                    <label for="folio_factura" class="mb-2 font-bold text-lg text-grey-darkest">Folio de
                        factura</label>
                    <input type="text" name="folio_factura" id="folio_factura" placeholder="Folio de factura"
                        class="border py-2 px-3 text-grey-darkest rounded-lg ">
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
@endsection
