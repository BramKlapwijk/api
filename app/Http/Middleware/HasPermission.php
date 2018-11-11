<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $category
     * @param  string  $function
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
        $param = $request->route('category') ? $param.' '.$request->route('category') : $param;
        
        if (auth()->user()->can($param)) {
            return $next($request);
        }

        return redirect()->to($request->route('category'))->with('error', "You don't have the right permissions");
    }
}
