<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/users')
            ->assertStatus(200)   // Mirem si carrega correctament.
            ->assertSee('Users'); // Comprovem si es visualitza el text 'Users'.
    }
}
