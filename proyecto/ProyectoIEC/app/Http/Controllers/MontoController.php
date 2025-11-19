<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class MontoController extends Controller
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
        return view('forms.monto', compact('datos'));
    }

    public function calculo(Request $request)
    {

        $renta = $request->post('renta');
        $tasa_interes = $request->post('tasa_interes');
        $periodicidad = $request->post('periodicidad');

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

            $n = 0;
            if ($request->filled('num_periodos')) {
                $n = $request->post('num_periodos');
            } else {
                //calcular n como la relacion entre periodos de renta y capitalizacion
                $n = $freq_cap;
            }

            //ajustar la tasa de interes segun la capitalizacion
            $i_cap = $tasa_interes / $freq_cap;

            // $i_pago = pow(1 + $i_cap, $freq_cap / $freq_pago) - 1;

            $m = ($renta * ((pow((1 + $i_cap), $n) - 1) / $i_cap)) * (1 + $i_cap);
            $m = round($m, 2);
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

            $freq_pago = $periodos_por_anio[$periodicidad];
            $n = $freq_pago;
            $m = ($renta * ((pow((1 + $tasa_interes), $n ) - 1) / $tasa_interes)) * (1 + $tasa_interes);
            $m = round($m, 2);
        }


        // Guardar en historial
        HistorialCalculo::create([
            'tipo_calculo' => 'monto',
            'valores_entrada' => $request->all(),
            'resultado' => $m
        ]);

        return view('home', compact('m'));
    }
}
