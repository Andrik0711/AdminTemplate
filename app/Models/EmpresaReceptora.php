<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaReceptora extends Model
{
    use HasFactory;
    protected $table = 'empresa_receptora';
    protected $fillable = ['nombre', 'direccion', 'rfc_receptor', 'contacto', 'email'];

    // Relación uno a muchos donde una empresa receptora puede tener muchas facturas
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'empresa_receptora_id');
    }

    // Evento de eliminación para eliminar las facturas asociadas
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($empresaReceptora) {
            $empresaReceptora->facturas()->delete();
        });
    }
}
