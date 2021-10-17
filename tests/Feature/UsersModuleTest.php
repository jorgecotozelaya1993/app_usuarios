<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function cargar_lista_usuario(){
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Informe de Usuarios');

    }

     /** @test */
     function crear_nuevo_usuario(){
        $this->get('/usuarios/nuevo')
        ->assertStatus(200)
        ->assertSee('Crear nuevo Usuario');

    }

    /** @test */
    function cargar_detalle_usuarios(){
        $this->get('/usuarios/5')
        ->assertStatus(200)
        ->assertSee('Mostrando detalle del usuario: 5');

    }

     /** @test */
     function error_404(){
        $this->get('/usuarios/100')
        ->assertStatus(404)
        ->assertSee('Usuario no encontrado');

    }

     /** @test */
     function test_nuevo_usuario(){
        $this->post('/usuarios/',[
        'name' => 'Jorge Coto',
        'email' => 'jorgealberto.cotozelaya@gmail.com',
        'password' => 'Jorge123'
        ])->assertSee('Procesando informacion');


        $this->assertDatabaseHas('users',[
            'name' => 'Jorge Coto',
            'email' => 'jorgealberto.cotozelaya@gmail.com',
            'password' => 'Jorge123'
        ]);

        $this->assertCredentials([
            'name' => 'Jorge Coto',
            'email' => 'jorgealberto.cotozelaya@gmail.com',
            'password' => 'Jorge123'
        ]);
    }

      /** @test */
      function elcampo_nombre_requerido(){

        //$this->withoutExceptionHandling();

          $this->from('/usuarios/nuevo')->post('/usuarios',[
              'name' => 'Jorge Coto',
              'email' => 'jorgealberto.cotozelaya@gmail.com',
              'password' => '123'
          ])->assertRedirect('/usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

          $this->assertDatabaseMissing('users',[
              'email' => 'jorgealberto.cotozelaya@gmail.com',
          ]);
      }

    /** @test */
    function cargar_editar_usuario(){
        $user =  factory(User::class)->create();
        $this->get("usuarios/{$user->id}/editar")
        ->assertStatus(200)
        ->assertViewIs('users.editar')
        ->assertSee('Editar Usuario')
        ->assertViewHas('user', function($viewUser) use ($user){
            return $viewUser->id == $user->id;
        });
     }

      /** @test */
      function actualizar_usuario()
      {
          $user = factory(User::class)->create();
        $this->withoutExceptionHandling();
          $this->put("/usuarios/{$user->id}",[
              'name' => 'pedro',
              'email' => 'pedro@gmail.com',
              'password' => '123'
          ])->assertRedirect("/usuarios/{$user->id}");

          $this->assertCredentials([
            'name' => 'pedro',
            'email' => 'pedro@gmail.com',
            'password' => '123'
          ]);
      }

       /** @test */
     function eliminar_un_usuario(){
        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'email' => '88@gmail.com'
        ]);

        $this->delete("usuarios/{$user->id}")
            ->assertRedirect('usuarios');
        
         $this->assertDatabaseMissing('users', [
            'id' => $user->id
         ]); 
         
         //$this->assertSame(0, User::count());
     }

}
