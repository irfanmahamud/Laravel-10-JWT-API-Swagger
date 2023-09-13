<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleListTest extends TestCase
{
    //use RefreshDatabase;
    protected function getAuthToken()
    {
        $user = User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $token = JWTAuth::fromUser($user);

        return 'Bearer ' . $token;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testArticleListWithAuthentication()
    {
        $token = $this->getAuthToken();

        $response = $this->withHeaders([
            'Authorization' => $token, // Add the JWT token as a bearer token
        ])->json('GET', '/api/articles'); // Replace with your actual endpoint

        $response->assertStatus(200); // Assuming a successful response status
        // Assert that the response JSON contains an array of articles
        $response->assertJsonStructure([
            '*' => [
                'user_id',
                'title',
                'description',
            ],
        ]);


    }

}
