<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_emisora_id')->constrained('empresa_emisora');
            $table->foreignId('empresa_receptora_id')->constrained('empresa_receptora');
            $table->string('folio_factura');
            $table->string('archivo_pdf')->nullable();
            $table->string('archivo_xml')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
