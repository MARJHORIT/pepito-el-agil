<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'boleta_numero',
        'codigo_presupuestal',
        'descripcion_codigo',
        'contribuyente',
        'motivo',
        'serie_documento',
        'cantidad',
        'monto',
        'total',
        'categoria',
        'user_id'
    ];

    protected $casts = [
        'fecha' => 'date',
        'cantidad' => 'integer',
        'monto' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getCategorias()
    {
        return [
            'Registro Civil' => '1.3.2.1.1.1',
            'Kioscos y Alquileres' => '1.3.2.9.1.5',
            'Servicio Saneamiento' => '1.3.3.9.2.21',
            'Autoavalúo' => '1.1.2.1.1.1',
            'Formularios' => '1.3.2.10.1.1',
            'Licencia Construcción' => '1.3.2.5.2.1',
        ];
    }

    public static function getCodigosPresupuestales()
    {
        return [
            '1.3.1.9.1.2' => 'VENTA DE BASES PARA LICITACIÓN PÚBLICA',
            '1.3.2.1.1.1' => 'REGISTROS CIVIL',
            '1.3.2.1.1.2' => 'TASAS REGISTRALES (MATRIMONIO CIVIL)',
            '1.3.2.1.4.1' => 'CERTIFICADO DOMICILIARIO',
            '1.3.2.5.2.1' => 'LICENCIA DE CONSTRUCCIÓN',
            '1.3.2.9.1.4' => 'LICENCIA DE FUNCIONAMIENTO Y OTROS',
            '1.3.2.10.1.1' => 'FORMULARIOS',
            '1.3.2.10.1.5' => 'CERTIFICACIONES DIVERSAS',
            '1.3.2.9.1.5' => 'PUESTO DE KIOSCOS Y OTROS',
            '1.3.3.5.1.1' => 'EDIFICIOS E INSTALACIONES CISA',
            '1.3.3.5.2.2' => 'MAQUINARIAS Y EQUIPOS',
            '1.3.3.9.2.1' => 'BAÑOS MUNICIPALES',
            '1.3.3.9.2.16' => 'SERVICIOS FUNERARIOS Y DE CEMENTERIO',
            '1.3.3.9.2.23' => 'LIMPIEZA PÚBLICA',
            '1.3.3.9.1.99' => 'OTROS SERVICIOS POR ADMINISTRACIÓN',
            '1.3.3.9.2.21' => 'SERVICIO DE SANEAMIENTO',
            '1.5.2.1.5.1' => 'INFRACCIONES DE REGLAMENTO DE TRÁNSITO',
            '1.1.2.1.1.1' => 'PAGO DE AUTOAVALÚO',
            '1.1.2.1.1.2' => 'PAGO DE AUTOAVALÚO AÑOS PASADOS',
            '1.3.28.16' => 'ESTACIONAMIENTO DE VEHÍCULOS',
            '1.3.25.2.99' => 'OTROS DERECHOS ADMINISTRATIVOS',
        ];
    }
}