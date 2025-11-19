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
                    <h3 class="card-title text-center justify-center mb-4">Calcular Capital segun una anualidad</h3>

                    <form action="capital_calculo" method="POST" class="space-y-4">
                        @csrf

                        <!-- Selector de incluir periodos -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Incluir numero de periodos</span>
                            </label>
                            <div class="flex gap-4">
                                <label class="label cursor-pointer gap-2">
                                    <input type="radio" name="usar_periodos" value="no" class="radio radio-primary" checked>
                                    <span class="label-text">No</span>
                                </label>
                                <label class="label cursor-pointer gap-2">
                                    <input type="radio" name="usar_periodos" value="si" class="radio radio-primary">
                                    <span class="label-text">Si</span>
                                </label>
                            </div>
                        </div>

                        <!-- Campo Numero de Periodos (n) -->
                        <div class="form-control" id="campo-periodos" style="display: none;">
                            <label class="label" for="num_periodos">
                                <span class="label-text">Número de Períodos (n)</span>
                            </label>
                            <input type="number" id="num_periodos" name="num_periodos" step="1" placeholder="Ingrese el número de períodos"
                                class="input input-bordered w-full" value="{{ old('num_periodos', $datos['num_periodos'] ?? '') }}">
                        </div>

                        <!-- Campo Renta (R) -->
                        <div class="form-control">
                            <label class="label" for="renta">
                                <span class="label-text">Renta (R)</span>
                            </label>
                            <input type="number" id="renta" name="renta" step="0.01" placeholder="Ingrese la renta"
                                class="input input-bordered w-full" required value="{{ old('renta', $datos['renta'] ?? '') }}">
                        </div>

                        <!-- Campo Tasa de Interés (i) -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Tipo de tasa de interés</span>
                            </label>
                            <div class="flex gap-4">
                                <label class="label cursor-pointer gap-2">
                                    <input type="radio" name="tipo_tasa" value="anual" class="radio radio-primary" checked>
                                    <span class="label-text">Tasa Anual</span>
                                </label>
                                <label class="label cursor-pointer gap-2">
                                    <input type="radio" name="tipo_tasa" value="convertida" class="radio radio-primary">
                                    <span class="label-text">Tasa Convertida</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label" for="tasa_interes">
                                <span class="label-text">Tasa de Interés (i) %</span>
                            </label>
                            <input type="number" id="tasa_interes" name="tasa_interes" step="0.000001"
                                placeholder="Ingrese la tasa de interés" class="input input-bordered w-full" required value="{{ old('tasa_interes', $datos['tasa_interes'] ?? '') }}">
                        </div>

                        <!-- Select Periodicidad de la Tasa -->
                        <div class="form-control">
                            <label class="label" for="periodicidad">
                                <span class="label-text">Periodicidad de la Renta</span>
                            </label>
                            <select id="periodicidad" name="periodicidad" class="select select-bordered w-full" required>
                                <option value="">Seleccione la periodicidad</option>
                                <option value="anual" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'anual' ? 'selected' : '' }}>Anual</option>
                                <option value="semestral" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'semestral' ? 'selected' : '' }}>Semestral</option>
                                <option value="trimestral" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'trimestral' ? 'selected' : '' }}>Trimestral</option>
                                <option value="bimestral" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'bimestral' ? 'selected' : '' }}>Bimestral</option>
                                <option value="mensual" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'mensual' ? 'selected' : '' }}>Mensual</option>
                                <option value="quincenal" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'quincenal' ? 'selected' : '' }}>Quincenal</option>
                                <option value="semanal" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'semanal' ? 'selected' : '' }}>Semanal</option>
                                <option value="diaria" {{ old('periodicidad', $datos['periodicidad'] ?? '') == 'diaria' ? 'selected' : '' }}>Diaria</option>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioNo = document.querySelector('input[name="usar_periodos"][value="no"]');
            const radioSi = document.querySelector('input[name="usar_periodos"][value="si"]');
            const campoPeriodos = document.getElementById('campo-periodos');
            const inputPeriodos = document.getElementById('num_periodos');

            function actualizarPeriodos() {
                if (radioSi.checked) {
                    campoPeriodos.style.display = 'block';
                    inputPeriodos.required = true;
                } else {
                    campoPeriodos.style.display = 'none';
                    inputPeriodos.required = false;
                    inputPeriodos.value = '';
                }
            }

            radioNo.addEventListener('change', actualizarPeriodos);
            radioSi.addEventListener('change', actualizarPeriodos);
            actualizarPeriodos();
        });
    </script>

    </div>
@endsection