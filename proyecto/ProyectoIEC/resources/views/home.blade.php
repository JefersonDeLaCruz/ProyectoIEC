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
            <ul class="menu bg-base-200 rounded-box w-full">
                <li><a href="{{ route('periodos-form') }}">Calcular periodos (n)</a></li>
                <li><a>Item 2</a></li>
                <li><a>Item 3</a></li>
            </ul>
        </div>

        @if (session('exito'))
            <div>
                <h1>{{ session('exito') }}</h1>
            </div>
        @endif

        @if ($n)
            <div>
                <h1>{{ $n }}</h1>
            </div>
        @endif
    </div>
@endsection