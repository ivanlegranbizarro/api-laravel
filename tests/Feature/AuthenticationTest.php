<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  use RefreshDatabase;
  #[Test]
  public function test_user_can_be_registered(): void
  {
    $this->postJson('/api/register', [
      'name' => 'Test User',
      'email' => 'test@example.com',
      'password' => 'password',
    ])->assertSuccessful();
  }

  #[Test]
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
