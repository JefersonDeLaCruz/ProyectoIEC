<?php

use App\Http\Controllers\CapitalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\RentaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/historial', [HomeController::class, 'historial'])->name('historial');

Route::post('/periodos_calculo', [PeriodosController::class, 'calculo'])->name('periodos_calculo');
Route::get('/periodos', [HomeController::class, 'periodos'])->name('periodos-form');


Route::post('/capital_calculo', [CapitalController::class, 'calculo'])->name('capital_calculo');
Route::get('/capital', [CapitalController::class, 'show_form'])->name('capital-form');

Route::post('/renta_calculo', [RentaController::class, 'calculo'])->name('renta_calculo');
Route::get('/renta', [RentaController::class, 'show_form'])->name('renta-form');