<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class CategoriesTestUnit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public $categoryName = "Categories Test";
    public $newCategoryName = "New Categories Test";

    protected function token(){
        $user = User::where('email', 'test@example.com')->first();
        $token = $user->createToken('UserToken')->accessToken;
        return $token;
    }

    public function testCategoryCreate(){
        $accessToken = $this->token();

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('POST', route('api.categories.create'), [
            'name' => $this->categoryName,
        ]);

        $response->assertStatus(200);
    }

    public function testCategoryUpdate(){
        $accessToken = $this->token();

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('PUT', route('api.categories.update'), [
            'name' => $this->newCategoryName,
            'old_name' => $this->categoryName,
        ]);

        $response->assertStatus(200);
    }

    public function testCategoryDelete(){
        $accessToken = $this->token();

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('DELETE', route('api.categories.delete'), [
            'name' => $this->newCategoryName,
        ]);

        $response->assertStatus(200);

        User::where('email','test@example.com')->delete();
    }
}
