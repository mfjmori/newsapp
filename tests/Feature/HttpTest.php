<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Httptest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use DatabaseMigrations;
     
    /** @test */
    public function unauthenticated_user()
    {
      $response = $this->get('/');
      $response->assertRedirect('/articles/technology');
      
      $response = $this->get('/articles/technology');
      $response->assertStatus(200);

      $response = $this->get('/articles/business');
      $response->assertStatus(200);

      $response = $this->get('/articles/science');
      $response->assertStatus(200);
      
      $response = $this->get('/articles/hacker-news');
      $response->assertStatus(200);

      $response = $this->get('/articles/mashable');
      $response->assertStatus(200);

      $response = $this->get('/articles/techcrunch');
      $response->assertStatus(200);

      $response = $this->get('/articles/the-verge');
      $response->assertStatus(200);

      $response = $this->get('/articles/techradar');
      $response->assertStatus(200);

      $response = $this->get('/articles/wired');
      $response->assertStatus(200);

      $response = $this->get('/articles/qiita');
      $response->assertStatus(200);

      $response = $this->get('/articles/recommend');
      $response->assertStatus(200);
      
      $response = $this->get('/no_route');
      $response->assertStatus(404);
      
      $response = $this->get('/login');
      $response->assertStatus(200);
      
      $response = $this->get('/register');
      $response->assertStatus(200);
      
      $response = $this->get('/stocks');
      $response->assertRedirect('/login');

    }
}
