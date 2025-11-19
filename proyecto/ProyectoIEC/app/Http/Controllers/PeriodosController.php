<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    //

    public function calculo(Request $request)
    {


        if ($request->filled('monto')) {
            $monto = $request->post('monto');
            $renta = $request->post('renta');
            $tasa_interes = $request->post('tasa_interes');
            $capitalizacion = $request->post('periodicidad');
            // $capitalizacion = $request->post('capitalizacion');

            $tasa_interes = $tasa_interes / 100;

            $n = 0;

            if ($request->post('tipo_tasa') == 'anual') {

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

                $freq_cap = $periodos_por_anio[$capitalizacion];

                $i_cap = $tasa_interes / $freq_cap;

                $n = (log(1 + (($monto * $i_cap) / ($renta * (1 + $i_cap))))) / (log(1 + $i_cap));
                $n = round($n, 0, PHP_ROUND_HALF_UP);
            } else {
                //aqui la tasa ya viene convertida y no hay que dividirla
                $n = (log(1 + (($monto * $tasa_interes) / ($renta * (1 + $tasa_interes))))) / (log(1 + $tasa_interes));
                $n = round($n, 0, PHP_ROUND_HALF_UP);
            }
        } else {
            //segun capital
            $capital = $request->post('capital');
            $renta = $request->post('renta');
            $tasa_interes = $request->post('tasa_interes');
            $capitalizacion = $request->post('periodicidad');
            // $capitalizacion = $request->post('capitalizacion');
            $tipo_tasa = $request->post('tipo_tasa');



            $tasa_interes = $tasa_interes / 100;

            $n = 0;

            if ($request->post('tipo_tasa') == 'anual') {

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

                $freq_cap = $periodos_por_anio[$capitalizacion];

                $i_cap = $tasa_interes / $freq_cap;

                // Debug: imprimir valores recibidos
                // dd([
                //     'capital' => $capital,
                //     'renta' => $renta,
                //     'tasa_interes' => $tasa_interes,
                //     'periodicidad' => $periodicidad,
                //     'capitalizacion' => $capitalizacion,
                //     'tipo_tasa' => $tipo_tasa,
                //     'tasa_dividida_100' => $tasa_interes / 100,
                //     'frec_cap' => $freq_cap,
                //     'nteres_cap' => $i_cap
                // ]);

                $n = (-1 * log(1 - (($capital * $i_cap) / ($renta * (1 + $i_cap))))) / (log(1 + $i_cap));
                $n = round($n, 0, PHP_ROUND_HALF_UP);
            } else {
                //aqui la tasa ya viene convertida y no hay que dividirla
                $n = (-1 * log(1 - (($capital * $tasa_interes) / ($renta * (1 + $tasa_interes))))) / (log(1 + $tasa_interes));
                $n = round($n, 0, PHP_ROUND_HALF_UP);
            }
        }




        // Guardar en historial
        HistorialCalculo::create([
            'tipo_calculo' => 'periodos',
            'valores_entrada' => $request->all(),
            'resultado' => $n
        ]);

        // return redirect()->route('home')->with('exito', "el resultado es {$n}");
        return view('home', compact('n'));
    }
}
