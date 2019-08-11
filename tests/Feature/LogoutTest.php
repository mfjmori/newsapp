<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    /** @test */
    public function logout()
    {
      $this->assertFalse(Auth::check());
      $user = factory(User::class)->create();
      $this->actingAs($user);
      $this->assertTrue(Auth::check());
      $response = $this->post('logout');
      $this->assertFalse(Auth::check());
      $response->assertRedirect('/articles/technology');
    }
}
