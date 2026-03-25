<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $fillable = ['monto', 'concepto', 'contribuyente_id', 'fecha'];

    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class);
    }
}