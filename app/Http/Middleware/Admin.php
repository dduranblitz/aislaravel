<?php

namespace Cinema\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

 protected $auth;

 public function __construct(Guard $auth){
   $this->auth=$auth;

 }

  


    public function handle($request, Closure $next)
    {

        if($this->auth->user()->rol!='administrador'){
         Session::flash('message-error', 'Sin privilegios');
         return redirect()->to('admin');
        }
       
       return $next($request);
}


}