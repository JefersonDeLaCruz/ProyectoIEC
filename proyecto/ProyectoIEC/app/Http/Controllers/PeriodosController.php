<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    //

    public function calculo(Request $request){

        $monto = $request->post('monto');
        $renta = $request->post('renta');
        $tasa_interes = $request->post('tasa_interes');
        $periodicidad = $request->post('periodicidad');
        $capitalizacion = $request->post('capitalizacion');


        $n = 0;
        if($periodicidad == $capitalizacion){

            $n = ( log(1 + ( ($monto*$tasa_interes) / ($renta*(1+$tasa_interes)) ) ) ) / (log(1+$tasa_interes));
            $n = round($n, 0, PHP_ROUND_HALF_UP);
        }else {
            # code...
        }


        // return redirect()->route('home')->with('exito', "el resultado es {$n}");
        return view('home', compact('n'));

        
    }
}
