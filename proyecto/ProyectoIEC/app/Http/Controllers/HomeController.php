<?php

namespace App\Http\Controllers;

use App\Models\HistorialCalculo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function documentacion(){
        return view('documentacion');
    }
    
    public function home(){

        // Obtener los ultimos 10 calculos del historial
        $historial = HistorialCalculo::latest()->take(10)->get();

        return view('home', compact('historial'));
    }

    public function periodos(Request $request){
        $datos = null;
        if($request->has('from_history')){
            $historial = HistorialCalculo::find($request->from_history);
            if($historial){
                $datos = $historial->valores_entrada;
            }
        } elseif ($request->has('from_exercise')) {
            //si viene de un ejercicio, tomar todos los parametros de la URL
            $datos = [
                'monto' => $request->get('monto'),
                'capital' => $request->get('capital'),
                'renta' => $request->get('renta'),
                'tipo_tasa' => $request->get('tipo_tasa'),
                'tasa_interes' => $request->get('tasa_interes'),
                'periodicidad' => $request->get('periodicidad'),
                'tipo_calculo' => $request->get('tipo_calculo')
            ];
        }
        return view('forms.periodos', compact('datos'));
    }

    public function historial(){
        $historial = HistorialCalculo::latest()->paginate(20);
        return view('historial', compact('historial'));
    }


    public function ejercicios(){
        $historial = HistorialCalculo::latest()->paginate(20);
        return view('ejercicios');
    }
}
