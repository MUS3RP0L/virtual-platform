<?php

namespace Muserpol\Http\Middleware\EconomicComplementMiddleware;

use Closure;

class Revision
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $rolUser = DB::table('role_user')->where('user_id','=',$user->id)->first();
            $user_rol = $rolUser->role_id;
            switch ($user_rol) {

                case '3':
                    return $next($request);
                    break;

                case '2':
                    # code...
                    return redirect('recepcion_route');
                    break;
                    
                case '1':
                    return redirect('administrador');
                    break;

                default:
                    # code...
                    return redirect('home');
                    break;
            }
        }
        else{
            return redirect('Login');
        }
    }
}
