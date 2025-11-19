@extends('layout.base')

@section('tittle', "Calculadora | Trinity")

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
        <h2 class="text-center font-semibold">Menu de operaciones</h2>
            <ul class="menu bg-base-200 rounded-box w-full">
                <li><a href="{{ route('periodos-form') }}">Calcular Periodos (n)</a></li>
                <li><a href="{{ route('capital-form') }}">Calcular Monto (M)</a></li>
                <li><a href="{{ route('capital-form') }}">Calcular Capital (C)</a></li>
                <li><a>Calcular Renta (R)</a></li>
            </ul>
        </div>

        @if (session('exito'))
            <div>
                <h1>{{ session('exito') }}</h1>
            </div>
        @endif

        @if (isset($n))
            <div>
                <h1>{{ $n }}</h1>
            </div>
        @endif

         @if (isset($c))
            <div>
                <h1>{{ $c }}</h1>
            </div>
        @endif
    </div>
@endsection