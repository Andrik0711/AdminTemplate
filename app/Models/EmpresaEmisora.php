<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaEmisora extends Model
{
    use HasFactory;
    protected $table = 'empresa_emisora';
    protected $fillable = ['razon_social', 'correo_contacto', 'rfc_emisor'];

    // Relación uno a muchos donde una empresa emisora puede tener muchas facturas
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'empresa_emisora_id');
    }

    // Evento de eliminación para eliminar las facturas asociadas
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($empresaEmisora) {
            $empresaEmisora->facturas()->delete();
        });
    }
}
