@extends('layout.base')

@section('tittle', "Calculadora | Trinity")

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen px-4 py-6 bg-base-200">
        <div class="w-full max-w-2xl">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-base-content mb-2">Calculadora Financiera</h1>
                <p class="text-base-content/70">Selecciona la operacion que deseas realizar</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('periodos-form') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-1">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-primary">n</span>
                            </div>
                            <div>
                                <h3 class="card-title text-lg">Periodos</h3>
                                <p class="text-sm text-base-content/60">Calcular numero de periodos</p>
                            </div>
                        </div>
                    </div>
                </a>
{{-- 
                <a href="{{ route('capital-form') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-1">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-secondary">M</span>
                            </div>
                            <div>
                                <h3 class="card-title text-lg">Monto</h3>
                                <p class="text-sm text-base-content/60">Calcular monto futuro</p>
                            </div>
                        </div>
                    </div>
                </a> --}}

                <a href="{{ route('capital-form') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-1">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-accent/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-accent">C</span>
                            </div>
                            <div>
                                <h3 class="card-title text-lg">Capital</h3>
                                <p class="text-sm text-base-content/60">Calcular capital inicial</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('monto-form') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-1">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-accent/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-accent">M</span>
                            </div>
                            <div>
                                <h3 class="card-title text-lg">Monto</h3>
                                <p class="text-sm text-base-content/60">Calcular monto inicial</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('renta-form') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-1">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-info/10 flex items-center justify-center">
                                <span class="text-2xl font-bold text-info">R</span>
                            </div>
                            <div>
                                <h3 class="card-title text-lg">Renta</h3>
                                <p class="text-sm text-base-content/60">Calcular valor de la renta</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        @if (session('exito'))
            <div class="alert alert-success shadow-lg max-w-2xl w-full mt-6">
                <span>{{ session('exito') }}</span>
            </div>
        @endif

        @if (isset($n))
            <div class="card bg-base-100 shadow-lg max-w-2xl w-full mt-6">
                <div class="card-body">
                    <h2 class="card-title">Resultado</h2>
                    <p class="text-3xl font-bold text-primary">{{ $n }} periodos</p>
                </div>
            </div>
        @endif

        @if (isset($c))
            <div class="card bg-base-100 shadow-lg max-w-2xl w-full mt-6">
                <div class="card-body">
                    <h2 class="card-title">Resultado</h2>
                    <p class="text-3xl font-bold text-secondary">${{ number_format($c, 2) }}</p>
                </div>
            </div>
        @endif

        @if (isset($r))
            <div class="card bg-base-100 shadow-lg max-w-2xl w-full mt-6">
                <div class="card-body">
                    <h2 class="card-title">Resultado de la Renta</h2>
                    <p class="text-3xl font-bold text-info">${{ number_format($r, 2) }}</p>
                </div>
            </div>
        @endif

        {{-- Historial de calculos --}}
        @if(isset($historial) && $historial->count() > 0)
            <div class="w-full max-w-2xl mt-8">
                <div class="card bg-base-100 shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Calculos Recientes</h2>
                        <div class="overflow-x-auto">
                            <table class="table table-zebra">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Resultado</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historial as $item)
                                        <tr>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    @if($item->tipo_calculo == 'periodos')
                                                        <span class="badge badge-primary">n</span>
                                                        <span>Periodos</span>
                                                    @elseif($item->tipo_calculo == 'capital')
                                                        <span class="badge badge-accent">C</span>
                                                        <span>Capital</span>
                                                    @elseif($item->tipo_calculo == 'renta')
                                                        <span class="badge badge-info">R</span>
                                                        <span>Renta</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="font-semibold">
                                                @if($item->tipo_calculo == 'periodos')
                                                    {{ number_format($item->resultado, 0) }} periodos
                                                @else
                                                    ${{ number_format($item->resultado, 2) }}
                                                @endif
                                            </td>
                                            <td class="text-sm text-base-content/60">
                                                {{ $item->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection