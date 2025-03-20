<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DelayResponse
{
    public function handle(Request $request, Closure $next, $seconds = 1): Response
    {
        sleep((int) $seconds);  // Apply the delay
        return $next($request);
    }
}
