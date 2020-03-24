<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Authority
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
        $user_authority = auth()->user()->user_authority;
    //    echo $user_authority;

        foreach($user_authority as $authority){
            $pattern = $authority->is_sub == true ? $authority->page_url.'/*' : $authority->page_url;
            if ($request->is($pattern)) {
                return $next($request);
            }
        }

        return redirect(url()->previous());

    }
}
