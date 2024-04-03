<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Register new user in storage.
   */
  public function register(UserRegistration $request): JsonResponse
  {
    $user = new User($request->validated());
    $user->password = bcrypt($request->password);
    $user->save();

    return response()->json($user, 201);
  }

  /**
   * Login the specified user
   */
  public function login(Request $request): JsonResponse
  {
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {
      return response()->json([
        'message' => 'Unauthorized',
      ], 401);
    }

    $accessToken = Auth::user()->createToken('authToken')->accessToken;

    return response()->json([
      'user' => Auth::user(),
      'access_token' => $accessToken
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
