<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotAdminOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $wantedUser = User::where('id', $request->user)->first();

        if($wantedUser->is_admin === 1){
            if(Auth::check()){
                if($wantedUser->id != auth()->user()->id){
                    return abort(404);
                }
            }else{
                return abort(404);
            }
        }

        return $next($request);
    }
}
