<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use function auth;

/**
 * @group Authentication
 * Authentication apis
 */
class AuthenticatedUserController extends Controller
{
    /**
     * Authenticated user
     *
     * @authenticated
     * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function __invoke()
    {
        return auth()->user();
    }
}
