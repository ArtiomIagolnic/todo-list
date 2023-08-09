<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\AuthToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Services\AuthTokenService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(
        Request $request,
        AuthTokenService $authTokenService
    ): JsonResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        $token = $authTokenService->generateToken($user->id);

        return response()->json([
            'user' => $user,
            'auth_token' => $token,
            
        ]);
    }
}
