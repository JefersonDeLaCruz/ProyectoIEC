@extends('layout.base')

@section('tittle', "Calculadora | Trinity")

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md mx-auto mt-6">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title text-center justify-center mb-4">Calcular Renta</h3>

                    <form action="renta_calculo" method="POST" class="space-y-4">
                        @csrf

                        <!-- Campo Monto (M) -->
                        <div class="form-control">
                            <label class="label" for="monto">
                                <span class="label-text">Monto (M)</span>
                            </label>
                            <input type="number" id="monto" name="monto" step="0.01" placeholder="Ingrese el monto"
                                class="input input-bordered w-full" required>
                        </div>

                        <!-- Campo Renta (R) -->
                        <div class="form-control">
                            <label class="label" for="n_pagos">
                                <span class="label-text">Cantidad de pagos (n)</span>
                            </label>
                            <input type="number" id="n_pagos" name="n_pagos" step="0.01" min="1" placeholder="Ingrese la cantidad de pagos"
                                class="input input-bordered w-full" required>
                        </div>

                        <!-- Campo Tasa de Interés (i) -->
                        <div class="form-control">
                            <label class="label" for="tasa_interes">
                                <span class="label-text">Tasa de Interés (i) %</span>
                            </label>
                            <input type="number" id="tasa_interes" name="tasa_interes" step="0.000001"
                                placeholder="Ingrese la tasa de interés" class="input input-bordered w-full" required>
                        </div>

                        <!-- Select Periodicidad de la Tasa -->
                        <div class="form-control">
                            <label class="label" for="periodicidad">
                                <span class="label-text">Periodicidad de la Tasa</span>
                            </label>
                            <select id="periodicidad" name="periodicidad" class="select select-bordered w-full" required>
                                <option value="">Seleccione la periodicidad</option>
                                <option value="anual">Anual</option>
                                <option value="semestral">Semestral</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="mensual">Mensual</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="semanal">Semanal</option>
                                <option value="diaria">Diaria</option>
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label" for="periodicidad">
                                <span class="label-text">Periodo de capitalizacion de la Tasa</span>
                            </label>
                            <select id="capitalizacion" name="capitalizacion" class="select select-bordered w-full"
                                required>
                                <option value="">Seleccione la frecuencia de capitalizacion</option>
                                <option value="anual">Anual</option>
                                <option value="semestral">Semestral</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="mensual">Mensual</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="semanal">Semanal</option>
                                <option value="diaria">Diaria</option>
                            </select>
                        </div>
                </div>

                <!-- Botón de Submit -->
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">
                        Calcular
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection