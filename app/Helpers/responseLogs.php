<?php

namespace App\Helpers;

use Monolog\Handler\RotatingFileHandler;
use Closure;
use Log;

class ResponseLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static function handle($request)
    {
        $handlers[] =new RotatingFileHandler(storage_path("logs/response.log"), 20);
        Log::setHandlers($handlers);
        Log::info($request);
        
        return true;
    }
}
