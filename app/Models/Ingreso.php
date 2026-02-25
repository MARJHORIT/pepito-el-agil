<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';

    protected $fillable = [
        'monto',
        'fecha',
        'persona_id',
        'clasificacion_id',
        'anio_fiscal_id'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }

    public function anioFiscal()
    {
        return $this->belongsTo(AnioFiscal::class);
    }
}