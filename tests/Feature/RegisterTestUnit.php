<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTestUnit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister(){
        $response = $this->json('POST', route('api.register'), [
            'name'  => 'Test',
            'email'  => 'test@example.com',
            'password'  => '12345678',
            'password_confirm' => '12345678',
        ]);

        $response->assertStatus(200);
    }
}
