@extends('layout')
@section('title', "Crear usuario")
@section('content')
    <br>
    <h1>Crear usuario</h1>


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

    <form method="POST" action="{{ url('/usuarios/crear') }}">

        {!! csrf_field() !!}


        <div class="mb-3 row">

            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control-plaintext" id="name" placeholder="Ejemplo Carlos Perez"
              value="{{ old('name') }}">

              @if ($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
              @endif
            </div>

            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control-plaintext" id="email" placeholder="email@example.com"
              value="{{ old('email') }}">

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

          <div class="mb-3">
            <label class="form-label">Codigo Pofesion: </label>
            
            <select class="form-select" name="profession_id">
              <option value="">-Seleccione Profesion-</option>
              @foreach ($categoria as $categorias)
                 <option value="{{ $categorias['id'] }}"> {{ $categorias['title'] }}</option>
              @endforeach
            </select>
        </div>



    <button type="submit" class="btn btn-primary"> Crear usuario </button>

    </form>

@endsection