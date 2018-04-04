<?php

namespace App\Http\Middleware;
//use Auth;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
//                $logouttime = date('m/d/Y h:i:s a', time());
//                print_r(Auth::user());
//                die;
//                $lo = \App\LoginHistory::where('user_id', $user_id)->where('logouttime', '')->first();
//
//                print_r($lo);
//                die;
//                \App\LoginHistory::where('user_id', 8)->update(array('logouttime' => $logouttime));


                return redirect()->guest('login');
            }
        }

        return $next($request);
    }

}
