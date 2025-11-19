<?php

use App\Http\Controllers\CapitalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/periodos_calculo', [PeriodosController::class, 'calculo'])->name('periodos_calculo');
Route::get('/periodos', [HomeController::class, 'periodos'])->name('periodos-form');


Route::post('/capital_calculo', [CapitalController::class, 'calculo'])->name('capital_calculo');
Route::get('/capital', [CapitalController::class, 'show_form'])->name('capital-form');