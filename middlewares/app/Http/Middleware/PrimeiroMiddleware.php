<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class PrimeiroMiddleware
{

    public function handle($request, Closure $next)
    {
        Log::debug('Passou pelo primeiro Middleware');
        $response = $next($request);
    }
}
