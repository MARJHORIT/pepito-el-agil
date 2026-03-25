<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    
    protected $table = 'ingresos';
    
    protected $fillable = [
        'numero_boleta',
        'codigo',
        'descripcion',
        'monto',
        'fecha',
        'cliente_nombre',
        'cliente_documento',
        'motivo',
        'metodo_pago',
        'estado',
        'observaciones'
    ];
    
    protected $casts = [
        'fecha' => 'date',
        'monto' => 'decimal:2'
    ];
    
    // Scope para filtrar por año
    public function scopeAnio($query, $anio)
    {
        return $query->whereYear('fecha', $anio);
    }
    
    // Scope para filtrar por mes
    public function scopeMes($query, $mes)
    {
        return $query->whereMonth('fecha', $mes);
    }
    
    // Scope para ingresos activos
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}