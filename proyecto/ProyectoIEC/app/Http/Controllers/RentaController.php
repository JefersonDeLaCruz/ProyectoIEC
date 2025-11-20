<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function show_form(Request $request)
    {
        $datos = null;
        if ($request->has('from_history')) {
            $historial = HistorialCalculo::find($request->from_history);
            if ($historial) {
                $datos = $historial->valores_entrada;
            }
        }
        return view('forms.renta', compact('datos'));
    }

    public function calculo(Request $request)
    {

        $capital = $request->post('capital');
        $monto = $request->post('monto');

        $tasa_interes = $request->post('tasa_interes');
        $periodicidad = $request->post('periodicidad');
        $n = $request->post('num_periodos');

        $tasa_interes = $tasa_interes / 100;

        if ($request->post('tipo_tasa') == 'anual') {

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
            $freq_cap = $periodos_por_anio[$periodicidad];

            //ajustar la tasa de interes segun la capitalizacion
            $i_cap = $tasa_interes / $freq_cap;

            if($monto != 0){

                $r = $monto / (((pow((1 + $i_cap), $n) - 1) / $i_cap) * (1 + $i_cap));
                $r = round($r, 2);
            }

            else{
                $r = $capital / (((1 - pow(1 + $i_cap, -$n)) / $i_cap) * (1 + $i_cap));
                $r = round($r, 2);
            }
        } 
        
        else {

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

            if($monto != 0){
                $r = $monto / (((pow(1 + $tasa_interes, $n) - 1) / $tasa_interes) * (1 + $tasa_interes));
                $r = round($r, 2);
            } else{
                $r = $capital / (((1 - pow(1 + $tasa_interes, -$n)) / $tasa_interes) * (1 + $tasa_interes));
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
