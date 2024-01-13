<?php

namespace App\Http\Middleware;

use Closure;

class Blogs
{
    public function handle($request, Closure $next)
    {
        if (app()->environment() !== 'testing') {
            header("Access-Control-Allow-Origin: http://localhost:8080");
            header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        }
return $next($request);
    }
}
