<?php

namespace App\Http\Middleware;

use Closure;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1 = null)
    {
        /**
         * Admin Users are free to do whatever they like.
         */
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return $next($request);
        }

        /**
         * If an array of roles is passed we check each one of them
         */
        if (!auth()->check() || !auth()->user()->hasRole($role1)) {
            $role = ucwords($role1);
            return redirect()->route('admin.home')
                ->withDanger("Only $role users can access this file.");
        }
                
        return $next($request);

    }

}
