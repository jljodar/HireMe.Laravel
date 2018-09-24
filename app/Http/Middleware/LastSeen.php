<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class LastSeen
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
        // Only if the user is authenticated
        if(auth()->check()) {
            $user = auth()->user();

            // Because last_seen_at is a guarded field, we can't assign it inside the update() mass assign parameter
            //   We need to access it like a normal property
            $user->last_seen_at = Carbon::now();
            $user->update();
        }

        return $next($request);
    }
}
