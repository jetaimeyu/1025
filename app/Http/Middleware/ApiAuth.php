<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return  response()->json(['status'=>0, 'message'=>'不安全的访问']);
        return json_encode(['status'=>0, 'message'=>'不安全的访问'], 401);
       // return $next($request);
    }
}
