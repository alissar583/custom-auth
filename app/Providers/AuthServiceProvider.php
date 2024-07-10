<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('custom-token', function (Request $request) {
            $token = $request->bearerToken();

            if ($token) {
                list($header, $payload, $signature) = explode('.', $token);
                
                $base64UrlHeader = base64_decode(str_replace(['-', '_'], ['+', '/'], $header));
                $base64UrlPayload = base64_decode(str_replace(['-', '_'], ['+', '/'], $payload));
                $base64UrlSignature = base64_decode(str_replace(['-', '_'], ['+', '/'], $signature));

                $headerArray = json_decode($base64UrlHeader, true);
                $payloadArray = json_decode($base64UrlPayload, true);

                if ($headerArray['alg'] !== 'HS256') {
                    return null;
                }

                $validSignature = hash_hmac('sha256', "$header.$payload", env('JWT_SECRET'), true);

                if ($base64UrlSignature !== $validSignature) {
                    return null;
                }

                if (isset($payloadArray['id'])) {
                    $userId = $payloadArray['id'];
                    return User::find($userId);
                }
            }

            return null;
        });
    }
}
