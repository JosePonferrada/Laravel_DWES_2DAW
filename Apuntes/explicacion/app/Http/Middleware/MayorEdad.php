<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $tope): Response
    {
        if ($request->route('edad') < $tope) {
            return redirect()->route('inicio');
            // return response('No puedes pasar, eres menor de edad', 403);
        }

        // También podemos hacerlo asociando un error a su código
        // return response('No puedes pasar, eres menor de edad', 403);

        return $next($request);
    }
}
