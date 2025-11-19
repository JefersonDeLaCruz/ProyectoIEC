@extends('layout.base')

@section('tittle', "Historial | Trinity")

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection


@section('content')
    <div class="flex flex-col items-center min-h-screen px-4 py-8 bg-base-200">
        <div class="w-full max-w-6xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Historial Completo de Calculos</h1>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver
                </a>
            </div>

            @if($historial->count() > 0)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="overflow-x-auto">
                            <table class="table table-zebra">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Valores de Entrada</th>
                                        <th>Resultado</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historial as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    @if($item->tipo_calculo == 'periodos')
                                                        <span class="badge badge-primary badge-lg">n</span>
                                                        <span class="font-semibold">Periodos</span>
                                                    @elseif($item->tipo_calculo == 'capital')
                                                        <span class="badge badge-accent badge-lg">C</span>
                                                        <span class="font-semibold">Capital</span>
                                                    @elseif($item->tipo_calculo == 'monto')
                                                        <span class="badge badge-accent badge-lg">M</span>
                                                        <span class="font-semibold">Monto</span>
                                                    @elseif($item->tipo_calculo == 'renta')
                                                        <span class="badge badge-info badge-lg">R</span>
                                                        <span class="font-semibold">Renta</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-sm">
                                                    @foreach($item->valores_entrada as $key => $value)
                                                        @if($value && !in_array($key, ['_token']))
                                                            <div><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="font-bold text-lg">
                                                @if($item->tipo_calculo == 'periodos')
                                                    <span class="text-primary">{{ number_format($item->resultado, 0) }}</span> periodos
                                                @else
                                                    <span class="text-success">${{ number_format($item->resultado, 2) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <div>{{ $item->created_at->format('d/m/Y H:i') }}</div>
                                                <div class="text-base-content/60">{{ $item->created_at->diffForHumans() }}</div>
                                            </td>
                                            <td>
                                                @php
                                                    $routeName = '';
                                                    if($item->tipo_calculo == 'periodos') {
                                                        $routeName = 'periodos-form';
                                                    } elseif($item->tipo_calculo == 'capital') {
                                                        $routeName = 'capital-form';
                                                    } elseif($item->tipo_calculo == 'monto') {
                                                        $routeName = 'renta-form';
                                                    }elseif($item->tipo_calculo == 'renta') {
                                                        $routeName = 'renta-form';
                                                    }
                                                @endphp
                                                <a href="{{ route($routeName, ['from_history' => $item->id]) }}" class="btn btn-sm btn-outline btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Editar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Paginacion --}}
                        <div class="flex justify-center mt-6">
                            {{ $historial->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>No hay calculos en el historial aun</span>
                </div>
            @endif
        </div>
    </div>
@endsection