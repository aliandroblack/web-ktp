<?php

namespace App\Http\Middleware;
use Closure;


class Authlogin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        $session = session('SESSION_USER_ID');
        //$role = session('SESSION_USER_ROLE');
        if (empty($session)) 
        {
            return redirect('auth')->with('ctlError', 'Silahkan login terlebih dulu');
        }else{
            return $next($request);
        }
       
    }

}
