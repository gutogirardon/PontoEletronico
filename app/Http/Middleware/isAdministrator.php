<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use DB;


class isAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Colaborador 1 $$ Administrador 2
        if (auth()->check() && $request->user()->role_id == 1) {
            abort(401, 'This action is unauthorized.');
            //return redirect()->guest('home');
        }
        return $next($request);
    }
}