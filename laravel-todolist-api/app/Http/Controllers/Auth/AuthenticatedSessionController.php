<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuthToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\AuthTokenService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request,AuthTokenService $authTokenService): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $token = $authTokenService->generateToken($user->id);

        return response()->json([
            'auth_token' => $token,
            'message' => 'auth successfull',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
