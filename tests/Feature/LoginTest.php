<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    /** @test */
    public function valid_user_can_login()
    {
      $user = factory(User::class)->create([
        'password'  => bcrypt('test1111')
      ]);

      $this->assertFalse(Auth::check());

      $response = $this->post('/login', [
          'email'    => $user->email,
          'password' => 'test1111'
      ]);

      $this->assertTrue(Auth::check());
      $response->assertRedirect('/articles/technology');
    }

    /** @test */
    public function invalid_user_cannot_login()
    {
      $user = factory(User::class)->create([
        'password'  => bcrypt('test1111')
      ]);

      $this->assertFalse(Auth::check());

      $response = $this->post('/login', [
          'email'    => $user->email,
          'password' => 'test2222'
      ]);

      $this->assertFalse(Auth::check());
      $response->assertSessionHasErrors(['email']);

      $this->assertEquals('These credentials do not match our records.',
      session('errors')->first('email'));
    }
}
