<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  use RefreshDatabase;
  /** @test */
  public function test_user_can_be_registered(): void
  {
    $this->postJson('/api/register', [
      'name' => 'Test User',
      'email' => 'test@example.com',
      'password' => 'password',
    ])->assertSuccessful();
  }

  /** @test */
  public function test_user_can_login(): void
  {
    $user = User::factory()->create();
    $response = $this->postJson('/api/login', [
      'email' => $user->email,
      'password' => 'password',
    ]);

    $this->assertTrue(Auth::attempt(['email' => $user->email, 'password' => 'password']));
  }
}
