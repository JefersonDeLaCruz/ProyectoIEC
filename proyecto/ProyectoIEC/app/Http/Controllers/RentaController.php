<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function show_form(Request $request){
        $datos = null;
        if($request->has('from_history')){
            $historial = HistorialCalculo::find($request->from_history);
            if($historial){
                $datos = $historial->valores_entrada;
            }
        }
        return view('forms.renta', compact('datos'));
    }

    public function calculo(Request $request){
        
        $capital = $request->post('capital');
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

        if($monto != 0){

            if($periodicidad != $capitalizacion){
    
                $i_cap = $tasa_interes / $freq_cap;
                $r = $monto / ((((pow((1 + $i_cap), ($n + 1)) - 1)) / $i_cap) - 1);
                $r = round($r, 2);
            }
    
            else{
                $r = $monto / ((((pow((1 + $tasa_interes), ($n + 1)) - 1)) / $tasa_interes) - 1);
                $r = round($r, 2);
            }
        }

        else{

           if($periodicidad != $capitalizacion){
    
                $i_cap = $tasa_interes / $freq_cap;

                $r = $capital / ((1 + (1 - (pow((1 + $i_cap), ((-1*$n) + 1)))) / $i_cap));
                $r = round($r, 2);
            }
    
            else{
                //$r = $monto / ((((pow((1 + $tasa_interes), ($n + 1)) - 1)) / $tasa_interes) - 1);
                $r = $capital / ((1 + (1 - (pow((1 + $tasa_interes), ((-1*$n) + 1)))) / $tasa_interes));
                $r = round($r, 2);
            } 
        }
        
        // Guardar en historial
        HistorialCalculo::create([
            'tipo_calculo' => 'renta',
            'valores_entrada' => $request->all(),
            'resultado' => $r
        ]);

        return view('home', compact('r'));
    }
}
