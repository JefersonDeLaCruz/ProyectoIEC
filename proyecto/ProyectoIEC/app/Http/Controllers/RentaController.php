<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function show_form(){
        return view('forms.renta');
    }

    public function calculo(Request $request){
        
        $monto = $request->post('monto');
        $tasa_interes = $request->post('tasa_interes');
        $n_pagos = $request->post('n_pagos');
        $periodicidad = $request->post('periodicidad');
        $capitalizacion = $request->post('capitalizacion');

        $tasa_interes = $tasa_interes / 100;

        $periodos_por_anio = [
            'anual' => 1,
            'semestral' => 2,
            'trimestral' => 4,
            'bimestral' => 6,
            'mensual' => 12,
            'quincenal' => 24,
            'semanal' => 52,
            'diaria' => 365
        ];

        $freq_pago = $periodos_por_anio[$periodicidad];
        $freq_cap = $periodos_por_anio[$capitalizacion];

        $n = $n_pagos;

        if($periodicidad != $capitalizacion){

            $i_cap = $tasa_interes / $freq_cap;
            $r = $monto / ((((pow((1 + $i_cap), ($n + 1)) - 1)) / $i_cap) - 1);
            $r = round($r, 2);
        }

        else{
            $r = $monto / ((((pow((1 + $tasa_interes), ($n + 1)) - 1)) / $tasa_interes) - 1);
            $r = round($r, 2);
        }
        

        return view('home', compact('r'));
    }
}
