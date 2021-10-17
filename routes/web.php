<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios' , 'UserController@index');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::post('/usuarios/crear', 'UserController@store');

Route::get('/usuarios/{user}/editar','UserController@editar');

Route::put('/usuarios/{user}','UserController@actualizar');

Route::delete('/usuarios/{user}','UserController@destroy');

Route::get('/usuarios/{id}', 'UserController@show')->where('id', '[0-9]+');

Route::get('/saludo/{nombre}/{apodo?}', function($nombre, $apodo = null){
    if ($apodo){
        return "Bienvenido {$nombre}, tu apodo es {$apodo}";
    }else{
        return "Bienvenido {$nombre}, no tienes apodo";
    }
});



