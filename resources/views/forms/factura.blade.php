@extends('dashboard')

@section('title')
    Factura
@endsection

{{-- Directiva para integrar los estilos de dropzon --}}
@push('styles')
    {{-- Estilos de dropzone css --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    {{-- Formulario para el registro de una factura --}}
    <div class="container mx-auto py-8 ">
        <h1 class="text-2xl font-bold mb-6 text-center">Registro de factura</h1>
        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="{{ route('factura.store') }}"
            method="POST" novalidate enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="empresa_emisora">Empresa Emisora</label>
                <select
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    id="empresa_emisora" name="empresa_emisora">
                    @foreach ($empresasEmisoras as $empresaEmisora)
                        <option value="{{ $empresaEmisora->id }}">{{ $empresaEmisora->razon_social }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rfc_receptor">RFC Receptor</label>
                <select
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    id="rfc_receptor" name="rfc_receptor">
                    @foreach ($empresasReceptoras as $empresaReceptora)
                        <option value="{{ $empresaReceptora->id }}">{{ $empresaReceptora->rfc_receptor }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="folio_factura">Folio de Factura</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="folio_factura" name="folio_factura" placeholder="Folio de Factura"
                    value="{{ old('folio_factura') }}">
                {{-- Mensaje de error si no se llena el campo --}}
                @error('folio_factura')
                    <p class="bg-red-500
                        text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }} </p>
                @enderror
            </div>

            {{-- Agregamos campo oculto para la subida de archivo --}}
            <div class="mb-4">
                <input name="archivo" type="hidden" id="archivo" value="{{ old('value') }}" />
                @error('archivo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                @enderror
            </div>

            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" value="Subir archivo">Registrar</button>
        </form>

        {{-- Form para la subida de archivos --}}
        <div class="mb-10">
            <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-100 h-100 rounded flex justify-center items-center">
                @csrf
            </form>
        </div>
    </div>
@endsection


{{-- Directiva para integrar los scripts de dropzone --}}
{{-- @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
@endpush --}}
