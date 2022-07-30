<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class ArticlesTestUnit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public $newsTitleTest = "Test";
    public $newTitle = "Test 2";

    protected function token(){
        $user = User::where('email', 'test@example.com')->first();
        $token = $user->createToken('UserToken')->accessToken;
        return $token;
    }

    public function testArticleCreate(){
        $accessToken = $this->token();
        $file = UploadedFile::fake()->image('test.png');

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('POST', route('api.articles.create'), [
            'title' => $this->newsTitleTest,
            'content'=> 'Content',
            'image' => $file,
            'category_id' => 1,
        ]);

        $response->assertStatus(200);
    }

    public function testArticleUpdate(){
        $accessToken = $this->token();
        $newsID = Articles::where('title', $this->newsTitleTest)->first()->id;

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('PUT', route('api.articles.update'), [
            'id' => $newsID,
            'title' => $this->newTitle,
        ]);

        $response->assertStatus(200);
    }

    public function testArticleDelete(){
        $accessToken = $this->token();
        $newsID = Articles::where('title', $this->newTitle)->first()->id;

        $response = $this->withHeader('Authorization', 'Bearer '.$accessToken)->json('DELETE', route('api.articles.delete'), [
            'id' => $newsID,
        ]);

        $response->assertStatus(200);

        User::where('email','test@example.com')->delete();
    }
}
