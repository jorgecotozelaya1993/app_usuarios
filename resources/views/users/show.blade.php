@extends('layout')
@section('title', "Usuario {$user->id}")
@section('content')
<br>
<br>
<h1> Usuario # {{$user->id}}</h1>


<a href="{{ url()->previous() }}">Regresar al listado del usuario</a>

<table class="table table-dark table-striped">
        <thead>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Profession</th>
        </tr>
        </thead>
        <tbody>
                <th>
                    {{ $user->id }}
                </th>
                 <th>
                    {{$user->name}}
                </th>
                 <th>
                   {{$user->email}}
                </th>
                <th>
                        {{$user->profession_id}}
                </th>
        </tbody>
</table>


@endsection