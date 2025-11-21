@extends('layout.base')

@section('tittle', 'Documentacion | Trinity')

@section('header')
    <div class="">
        @include('layout.navbar')
    </div>
@endsection

@section('content')

    <div class="flex flex-col items-center justify-center min-h-screen px-4 py-6 bg-base-200">
        <div class="flex items-center justify-center">
            <img class="rounded-xl" src="{{ asset('img/notfound.jpg') }}" alt="">
        </div>
    </div>
@endsection