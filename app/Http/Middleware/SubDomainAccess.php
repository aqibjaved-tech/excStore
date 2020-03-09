<?php
namespace App\Http\Middleware;

use Closure;

class SubDomainAccess
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
        $server = explode('.', $request->getHost());
        $subdomain = $server[0];
//         $subdomain = 'jjs';

        $request->attributes->add(['domain' => 'sundiego']);

        // check if sub domain exists, replace with your own conditional check
        // if (! Account::where('slug', $subdomain)->first()) {
        //     return abort(404); // or redirect to your homepage route.
        // }

         return $next($request);
    }
}
