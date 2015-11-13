<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Read
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth=$auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $modulos = $this->auth->user()->modulos;
        //dd($modulos);
        foreach ($modulos as $modulo) {
            if ($modulo->nombre == 'Usuarios' && $modulo->pivot->r == 0) {
                $request->session()->flash('message-error', 'Permiso No Asignado');
                
                return redirect()->route('inicio');
            }

                else if ($modulo->nombre == 'Reservaciones' && $modulo->pivot->r == 0) {
                    $request->session()->flash('message-error', 'Permiso No Asignado');
                    
                    return redirect()->route('inicio');
                }

                else if ($modulo->nombre == 'Cotizaciones' && $modulo->pivot->r == 0) {
                    $request->session()->flash('message-error', 'Permiso No Asignado');
                    
                    return redirect()->route('inicio');
                }

            else
                return $next($request);
        }

        return $next($request);
    }
}
