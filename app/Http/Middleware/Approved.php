<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Approved
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
        $post = Post::where('slug', $request->post)->first();

        if($post->odobren === 0){
            if(Auth::check()){
                if(auth()->user()->id === $post->korisnik_id || auth()->user()->is_admin === 1){
                    return $next($request);
                }
            }
        }else{
            return $next($request);
        }

        return abort(404);
    }
}
