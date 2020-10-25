<?php namespace Rajv3\SpaTheme\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CorsRequest
 * 
 */
class Cors
{
 
    /**
     * Create a new Cors instance.
     *
     *  
     */
    public function __construct()
    { 
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return bool|\Illuminate\Http\RedirectResponse|mixed|string
     */
    public function handle(Request $request, Closure $next)
    { 
        
        return $next($request);
    }
}
