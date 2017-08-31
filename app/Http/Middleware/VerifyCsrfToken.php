<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;
use Config;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected $excludeRoutes = [
		'egift*'
	];

    /**
	 * Determine if the session and input CSRF tokens match.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	public function handle($request, Closure $next)
	{
	    foreach( $this->excludeRoutes as $route )
			{
				if( $request->is( $route ) ) return $next($request);
			}

		return parent::handle($request, $next);
	}
}
