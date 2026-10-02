<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ExpireAuthSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return $next($request);
        }

        $expiresAt = (int) $request->cookie('auth_expires_at');

        if ($expiresAt === 0) {
            if (Auth::viaRemember()) {
                return $this->endSession($request);
            }

            cookie()->queue(cookie(
                'auth_expires_at',
                (string) now()->addHours(10)->getTimestamp(),
                600
            ));

            return $next($request);
        }

        if (now()->getTimestamp() >= $expiresAt) {
            return $this->endSession($request);
        }

        return $next($request);
    }

    private function endSession(Request $request): Response
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        cookie()->queue(cookie()->forget('auth_expires_at'));

        return redirect()->route('login')->with('error', 'Sesi login berakhir setelah 10 jam. Silakan masuk lagi.');
    }
}
