<?php

namespace App\Services;

use App\Models\AuthToken;
use Illuminate\Support\Str;

class AuthTokenService
{
    public function generateToken( $userId)
    {
        $token = Str::random(40);
        $expiresDate = now()->addHours(12);

        AuthToken::create([
            'user_id'=>$userId,
            'token'=>$token,
            'expires_at'=>$expiresDate
        ]);

        return $token;
    }
}
