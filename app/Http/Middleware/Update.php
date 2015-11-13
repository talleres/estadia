<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Update
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
        $modulos=$this->auth->user()->modulos;
        //dd($modulos);
        foreach ($modulos as $modulo) {
            
        }

        return $next($request);
    }
}
