<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

    public function handle( Request $request, Closure $next, ...$role ): Response {
        if ( Auth::check() && Auth::user()->hasRole( $role ) ) {
            return $next( $request );

        }
        // abort not authorized to access this page or redirect to home page
        return redirect( '/' );
    }
}
