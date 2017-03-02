<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {

       if(Auth::check()){
           $id = Auth::user();
           if(!empty($id)){
               $user = User::find($id->id);
               if ((int)$user->is_admin == (int)config('auth.guards.is_admin'))
               {
                   $collection = collect($id);
                   $thisdata = $collection->toArray();
                   //$thisdata = Auth::user();
                   $request->session()->put('users', $thisdata);

                   return $next($request);
               }
           }
       }
        
        return redirect()->guest('/');


    }
}
