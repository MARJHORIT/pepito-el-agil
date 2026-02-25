<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnioFiscal extends Model
{
    protected $table = 'anio_fiscals';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin'
    ];
}