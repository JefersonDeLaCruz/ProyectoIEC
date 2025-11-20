<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    //
    public function show_form(Request $request)
    {
        $datos = null;
        if ($request->has('from_history')) {
            $historial = HistorialCalculo::find($request->from_history);
            if ($historial) {
                $datos = $historial->valores_entrada;
            }
        } elseif ($request->has('from_exercise')) {
            //si viene de un ejercicio, tomar todos los parametros de la URL
            $datos = [
                'renta' => $request->get('renta'),
                'tipo_tasa' => $request->get('tipo_tasa'),
                'tasa_interes' => $request->get('tasa_interes'),
                'periodicidad' => $request->get('periodicidad'),
                'num_periodos' => $request->get('num_periodos'),
                'usar_periodos' => $request->get('num_periodos') ? 'si' : 'no'
            ];
        }
        return view('forms.capital', compact('datos'));
    }
    public function calculo(Request $request)
    {

        // $monto = $request->post('monto');
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
                # code...
                //calcular n como la relacion entre periodos de renta y capitalizacion
                $n = $freq_cap;
            }

            //ajustar la tasa de interes segun la capitalizacion
            $i_cap = $tasa_interes / $freq_cap;

            // $i_pago = pow(1 + $i_cap, $freq_cap / $freq_pago) - 1;

            // $i_pago = pow(1 + $tasa_ajustada, $freq_cap / $freq_pago) - 1;
            //calcular el capital usando la formula de anualidad anticipada
            $c = $renta * ((1 - pow((1 + $i_cap), $n * -1)) / $i_cap) * (1 + $i_cap);
            $c = round($c, 2);
        } else {


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

            $n = 0;
            if ($request->filled('num_periodos')) {
                $n = $request->post('num_periodos');
            } else {
                # code...
                //calcular n como la relacion entre periodos de renta y capitalizacion
                $n = $freq_pago;
            }
            // $n = $freq_pago;

            // dd([
            //     'request_all'   => $request->all(),
            //     'renta'         => $renta,
            //     'tasa_interes'  => $tasa_interes,
            //     'periodicidad'  => $periodicidad,
            //     'tipo_tasa'     => $request->post('tipo_tasa'),
            //     'freq_pago'     => $freq_pago,
            //     'n'             => $n,
            // ]);
            $c = $renta * ((1 - pow((1 + $tasa_interes), $n * -1)) / $tasa_interes) * (1 + $tasa_interes);
            $c = round($c, 2);
        }


        // Guardar en historial
        HistorialCalculo::create([
            'tipo_calculo' => 'capital',
            'valores_entrada' => $request->all(),
            'resultado' => $c
        ]);

        // return redirect()->route('home')->with('exito', "el resultado es {$n}");
        return view('home', compact('c'));
    }
}
