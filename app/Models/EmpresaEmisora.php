<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaEmisora extends Model
{
    use HasFactory;
    protected $table = 'empresa_emisora';
    protected $fillable = ['razon_social', 'correo_contacto', 'rfc_emisor'];
}
