<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * @group Authentication
 * Authentication apis
 */
class AuthenticatedSessionController extends Controller
{
    /**
     * Login
     *
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = User::whereEmail($request->email)->first();

        $user->tokens()->delete();
        $token = $user->createToken("login:user{$user->id}")->plainTextToken;

        return response()->json([
            'message' => 'successfully logged in',
            'token' => $token
        ], 200);
    }

    /**
     * Logout
     *
     * Destroy an authenticated session.
     *
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
