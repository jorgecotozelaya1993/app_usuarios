@extends('layout')
@section('title', "Editar Usuario")
@section('content')
    <br>
    <h1>Editar usuario</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
      <h6>Por favor corrige los errores de abajo: </h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

    <form method="POST" action="{{ url("/usuarios/{$user->id}") }}">

        {{ method_field('PUT') }}

        {!! csrf_field() !!}


        <div class="mb-3 row">

            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control-plaintext" id="name" placeholder="Ejemplo Carlos Perez"
              value="{{ old('name', $user->name) }}">

              @if ($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
              @endif
            </div>

            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control-plaintext" id="email" placeholder="email@example.com"
              value="{{ old('email', $user->email) }}">

              @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
              @endif
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="Password" placeholder="Mayor a 6 Caracteres"
              value="{{ old('password') }}">

              @if ($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
              @endif

            </div>
          </div>

          



    <button type="submit" class="btn btn-primary"> Actualizar Usuario </button>

    </form>



@endsection