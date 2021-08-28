@extends('layout')
@section('title', "Informe de Usuarios")
@section('content')
    <h1>  {{ $title }} </h1>
 
    <hr>

    @if(!empty($users))
            <ul>
                @foreach ($users as $user)
                <li>{{ $user }}</li>
            @endforeach
            </ul>
    @else
            <p>No hay usuarios registrados</p>
    @endif
@endsection
