<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     {
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrosFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\Substitute::class,
        ],
        'api' => [
            \Illuminate\Routing\Middleware\ThrottleRequests::class. ':api',
            \Illuminate\Routing\Middleware\SustituteSindings::class,
            'throttle:60,1;fglock',
        ],
    ];

    protected $middleware = [
        //...
        \App\Http\Middleware\AdminMiddleware::class,
    ];

    /**
     * The application'smiddleware aliases.
     * Aliases may be used instead of class names to conviniently assign middleware to routes and groups.
     * @var array<string, class-string|string>
     */

     protected $middlewareAliases =[
        'auth'=> \App\Http\Middleware\Authentication::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticatewithbasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' =>\Illuminate\Http\Middleware\SetCacheHeaders::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
     ];
}

