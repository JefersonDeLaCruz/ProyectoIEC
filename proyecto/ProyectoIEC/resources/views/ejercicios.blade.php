@extends('layout.base')

@section('tittle', 'Documentacion | Trinity')

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection

@section('content')

    <div class="flex flex-col items-center min-h-screen px-4 py-8 bg-base-200">
        <div class="w-full max-w-6xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Ejercicios Resueltos</h1>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6">

                {{-- Ejercicio práctico --}}
                {{--<div class="card bg-base-100 shadow-lg border rounded-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-info badge-lg">1</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3 badge badge-info badge-lg">Ejercicio propuesto</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        La empresa TechSV Solutions quiere comprar 12 computadoras
                                        dentro de 2 años. Para ello necesita <strong>$7,000</strong> 
                                        por computadora, haciendo un total de <strong>$84,000</strong> 
                                        . Deciden usar <strong>anualidades anticipadas</strong> con depósitos
                                        <strong>mensuales</strong> a una tasa de interés de <strong>8% convertible mensualmente</strong>. 
                                    </p>
                                    <p class="text-base-content mt-4">
                                        <strong>¿Cuánto deben depositar al inicio de cada mes?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-info">R</span>
                                            Renta
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Monto</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Monto (M):</span>
                                        <div class="font-semibold">$90,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Períodos (n):</span>
                                        <div class="font-semibold">12</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interés:</span>
                                        <div class="font-semibold">1.2% (convertida)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Bimestral</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('renta-form', [
                                        'from_exercise' => 1,
                                        'tipo_calculo' => 'monto',
                                        'monto' => 90000,
                                        'num_periodos' => 12,
                                        'tipo_tasa' => 'convertida',
                                        'tasa_interes' => 1.2,
                                        'periodicidad' => 'bimestral'
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
                
                {{-- Ejercicio 1 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-info badge-lg">1</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Renta</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        La señora Gavaldón debe pagar <strong>$90,000</strong> dentro de 2 años y, para reunir esta cantidad, decide hacer <strong>12 depósitos bimestrales</strong> en una cuenta de inversión que rinde <strong>1.2% bimestral</strong> de interés. 
                                    </p>
                                    <p class="text-base-content mt-2">
                                        <strong>¿De cuánto deben ser sus depósitos si hoy realiza el primero?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-info">R</span>
                                            Renta
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Monto</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Monto (M):</span>
                                        <div class="font-semibold">$90,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Períodos (n):</span>
                                        <div class="font-semibold">12</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interés:</span>
                                        <div class="font-semibold">1.2% (convertida)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Bimestral</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('renta-form', [
                                        'from_exercise' => 1,
                                        'tipo_calculo' => 'monto',
                                        'monto' => 90000,
                                        'num_periodos' => 12,
                                        'tipo_tasa' => 'convertida',
                                        'tasa_interes' => 1.2,
                                        'periodicidad' => 'bimestral'
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 2 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-success badge-lg">2</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Monto</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        Encuentre el monto de <strong>6 pagos semestrales anticipados</strong> de <strong>$14,500</strong> si el interes es de <strong>19%</strong> convertible semestralmente
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-success">M</span>
                                            Monto
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Renta</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$14,500</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodos (n):</span>
                                        <div class="font-semibold">6</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">19% (anual)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Semestral</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('monto-form', [
                                        'from_exercise' => 2,
                                        'renta' => 14500,
                                        'tipo_tasa' => 'anual',
                                        'num_periodos' => 6,
                                        'periodicidad' => 'semestral',
                                        'tasa_interes' => 19
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 3 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-warning badge-lg">3</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Capital</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        Un comerciante alquila un local para su negocio y acuerda pagar <strong>$2,750</strong> de renta por anticipado. Como desea librarse del compromiso mensual de la renta, decide proponer una renta anual equivalente y tambien anticipada.
                                    </p>
                                    <p class="text-base-content mt-2">
                                        Si se calculan los intereses a razon de <strong>15.60%</strong> convertible mensualmente, <strong>¿de cuanto debera ser la renta anual?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-warning">C</span>
                                            Capital
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Renta</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$2,750</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodos (n):</span>
                                        <div class="font-semibold">Auto (anual)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">15.60% (anual)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Mensual</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('capital-form', [
                                        'from_exercise' => 3,
                                        'renta' => 2750,
                                        'tipo_tasa' => 'anual',
                                        'periodicidad' => 'mensual',
                                        'tasa_interes' => 15.60
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 4 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-warning badge-lg">4</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Capital</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        Calcule el valor actual de <strong>9 pagos semestrales</strong> de <strong>$50,000</strong> con interes de <strong>5.28% semestral</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-warning">C</span>
                                            Capital
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Renta</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$50,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodos (n):</span>
                                        <div class="font-semibold">9</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">5.28% (convertida)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Semestral</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('capital-form', [
                                        'from_exercise' => 4,
                                        'renta' => 50000,
                                        'tipo_tasa' => 'convertida',
                                        'num_periodos' => 9,
                                        'periodicidad' => 'semestral',
                                        'tasa_interes' => 5.28
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 5 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-error badge-lg">5</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Periodos</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        La señora Ramirez piensa jubilarse luego de reunir <strong>$2,000,000</strong> mediante depositos mensuales de <strong>$5,000</strong> de las ganancias que obtiene de su negocio.
                                    </p>
                                    <p class="text-base-content mt-2">
                                        Si invierte sus depositos a una tasa de interes de <strong>0.25% mensual</strong> e inicia a partir del dia de hoy, <strong>¿en cuanto tiempo reunira la cantidad que desea?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-error">N</span>
                                            Periodos
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Monto</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Monto (M):</span>
                                        <div class="font-semibold">$2,000,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$5,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">0.25% (convertida)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Mensual</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('periodos-form', [
                                        'from_exercise' => 5,
                                        'tipo_calculo' => 'monto',
                                        'monto' => 2000000,
                                        'renta' => 5000,
                                        'tipo_tasa' => 'convertida',
                                        'tasa_interes' => 0.25,
                                        'periodicidad' => 'mensual'
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 6 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-error badge-lg">6</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Periodos</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        La señora Ramirez piensa jubilarse luego de reunir <strong>$500,000</strong> mediante depositos mensuales de <strong>$1,500</strong> de las ganancias que obtiene de su negocio.
                                    </p>
                                    <p class="text-base-content mt-2">
                                        Si invierte sus depositos a una tasa de interes de <strong>7% anual</strong> convertible cada mes e inicia a partir del dia de hoy, <strong>¿en cuanto tiempo reunira la cantidad que desea?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-error">N</span>
                                            Periodos
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Monto</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Monto (M):</span>
                                        <div class="font-semibold">$500,000</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$1,500</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">7% (anual)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Mensual</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('periodos-form', [
                                        'from_exercise' => 6,
                                        'tipo_calculo' => 'monto',
                                        'monto' => 500000,
                                        'renta' => 1500,
                                        'tipo_tasa' => 'anual',
                                        'tasa_interes' => 7,
                                        'periodicidad' => 'mensual'
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ejercicio 7 --}}
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="flex items-start gap-3">
                            <div class="badge badge-error badge-lg">7</div>
                            <div class="flex-1">
                                <h2 class="card-title mb-3">Calcular Periodos</h2>
                                <div class="bg-base-200 p-4 rounded-lg mb-4">
                                    <p class="text-base-content">
                                        Una agencia inmobiliaria oferta una casa con valor al contado de <strong>$74,800</strong>, o mediante pagos mensuales anticipados de <strong>$1,810.50</strong>.
                                    </p>
                                    <p class="text-base-content mt-2">
                                        Si el interes es de <strong>18.65% anual</strong> convertible mensualmente, <strong>¿cuantos pagos es necesario hacer?</strong>
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tipo:</span>
                                        <div class="font-semibold flex items-center gap-2">
                                            <span class="badge badge-error">N</span>
                                            Periodos
                                        </div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Desde:</span>
                                        <div class="font-semibold">Capital</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Capital (C):</span>
                                        <div class="font-semibold">$74,800</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Renta (R):</span>
                                        <div class="font-semibold">$1,810.50</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Tasa de interes:</span>
                                        <div class="font-semibold">18.65% (anual)</div>
                                    </div>
                                    <div class="bg-base-200/50 p-3 rounded">
                                        <span class="text-sm text-base-content/70">Periodicidad:</span>
                                        <div class="font-semibold">Mensual</div>
                                    </div>
                                </div>

                                <div class="card-actions justify-end">
                                    <a href="{{ route('periodos-form', [
                                        'from_exercise' => 7,
                                        'tipo_calculo' => 'capital',
                                        'capital' => 74800,
                                        'renta' => 1810.50,
                                        'tipo_tasa' => 'anual',
                                        'tasa_interes' => 18.65,
                                        'periodicidad' => 'mensual'
                                    ]) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Resolver Ejercicio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Aqui se pueden agregar mas ejercicios --}}
            </div>
        </div>
    </div>
@endsection