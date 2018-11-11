<?php

namespace App\Http\Middleware;

use App\ApiToken;
use App\User;
use Closure;

class HasApiPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
        $param = $request->route('category') ? $param.' '.$request->route('category') : $param;
        $user = User::findToken($request->get('token'))->first();

        if ($user->can($param)) {
            return $next($request);
        }

        abort(403);
    }
}
