<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
      /** @test void */
    function bienvenido_users_nickname(){
        $this->get('/saludo/jorge/coto')
        ->assertStatus(200)
        ->assertSee('Bienvenido jorge, tu apodo es coto');
    }

      /** @test void */
      function bienvenido_users_no_nickname(){
        $this->get('/saludo/jorge')
        ->assertStatus(200)
        ->assertSee('Bienvenido jorge, no tienes apodo');
    }
}
