<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        $endTime = microtime(true);
        $duration = round(($endTime - $startTime) * 1000, 2); // Convert to milliseconds

        $logMessage = "Request: {$request->getMethod()} {$request->getPathInfo()} - Duration: {$duration} ms";
        Log::info($logMessage);

        return $response;
    }
}
