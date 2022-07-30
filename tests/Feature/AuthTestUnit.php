<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class AuthTestUnit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin(){
        User::create([
            'name' => 'Test',
            'email'=> $email = 'test@example.com',
            'password' => $password = bcrypt('12345678')
        ]);

        $response = $this->json('POST', route('api.login'), [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
    }
}
