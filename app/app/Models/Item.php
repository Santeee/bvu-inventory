<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'elementos',
        'observaciones',
        'estado',
        'uso',
        'ubicacion',
        'destino',
        'observaciones_detalle',
        'movimiento',
        'fecha',
        'ubicacion_original',
        'destino_original',
        'clasificacion_ruba',
        'carga_ruba',
        'estado_general',
        'nueva_ubicacion',
        'destino_final',
        'operador',
        'fecha_actualizacion_inventario',
        'operador_carga',
    ];

    protected $casts = [
        'fecha' => 'date',
        'fecha_actualizacion_inventario' => 'date',
    ];

    // Accessor for display name
    public function getDisplayNameAttribute()
    {
        return $this->elementos;
    }

    // Scope for active items
    public function scopeActive($query)
    {
        return $query->where('estado', '!=', 'Roto');
    }

    // Scope for items in use
    public function scopeInUse($query)
    {
        return $query->where('uso', 'Sí');
    }
}
