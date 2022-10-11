<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyFrameMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);

        $response->headers->set('Content-Security-Policy', 'frame-ancestors "self" https://belongtome.com https://another.com', true);

        return $response;
    }
}
