<?php

namespace App\Http\Middleware;

use App\ApiToken;
use Closure;

class HasToken
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
        if (empty(ApiToken::where('token', $request->get('token'))->first()))
        {
            abort(403);
        }
        return $next($request);
    }
}
