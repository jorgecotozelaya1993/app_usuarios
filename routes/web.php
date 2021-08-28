<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/usuarios' , 'UserController@index');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('/usuarios/{id}', 'UserController@show')->where('id', '[0-9]+');

Route::get('/saludo/{nombre}/{apodo?}', function($nombre, $apodo = null){
    if ($apodo){
        return "Bienvenido {$nombre}, tu apodo es {$apodo}";
    }else{
        return "Bienvenido {$nombre}, no tienes apodo";
    }
});



