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
        }
        return view('forms.periodos', compact('datos'));
    }

    public function historial(){
        $historial = HistorialCalculo::latest()->paginate(20);
        return view('historial', compact('historial'));
    }
}
