<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCalculo extends Model
{
    protected $fillable = [
        'tipo_calculo',
        'valores_entrada',
        'resultado'
    ];

    protected $casts = [
        'valores_entrada' => 'array',
        'resultado' => 'decimal:6'
    ];
}
