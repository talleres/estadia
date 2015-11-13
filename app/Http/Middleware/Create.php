<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Create
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
    public function handle($request, Closure $next, $mod)
    {
        //$modulos=$this->auth->user()->modulos;
            if ($mod->pivot->c == 0) {
                $request->session()->flash('message-error', 'Permiso No Asignado');

                return redirect()->route('inicio');
            }

        return $next($request);
    }
}
