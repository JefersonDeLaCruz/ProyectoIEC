<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapitalController extends Controller
{
    //
     public function show_form(){
        return view('forms.capital');
    }
    public function calculo(Request $request){

        // $monto = $request->post('monto');
        $renta = $request->post('renta');
        $tasa_interes = $request->post('tasa_interes');
        $periodicidad = $request->post('periodicidad');
        $capitalizacion = $request->post('capitalizacion');

        $tasa_interes = $tasa_interes / 100;
        
        //mapeo de periodos a numero de periodos por año
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

        //obtener los valores numericos
        $freq_pago = $periodos_por_anio[$periodicidad];
        $freq_cap = $periodos_por_anio[$capitalizacion];

        //calcular n como la relacion entre periodos de renta y capitalizacion
        $n = $freq_cap;

        //ajustar la tasa de interes segun la capitalizacion
        $i_cap = $tasa_interes / $freq_cap;

        // $i_pago = pow(1 + $i_cap, $freq_cap / $freq_pago) - 1;

        // $i_pago = pow(1 + $tasa_ajustada, $freq_cap / $freq_pago) - 1;
        //calcular el capital usando la formula de anualidad anticipada
        $c = $renta * ((1 - pow((1 + $i_cap), $n * -1)) / $i_cap) * (1 + $i_cap);
        $c = round($c, 2);

        // return redirect()->route('home')->with('exito', "el resultado es {$n}");
        return view('home', compact('c'));

        
    }
}
