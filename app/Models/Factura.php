<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $fillable = ['empresa_emisora_id', 'empresa_receptora_id', 'folio_factura', 'archivo_pdf', 'archivo_xml'];

    public function empresaEmisora()
    {
        return $this->belongsTo(EmpresaEmisora::class, 'empresa_emisora_id');
    }

    public function empresaReceptora()
    {
        return $this->belongsTo(EmpresaReceptora::class, 'empresa_receptora_id');
    }
}
