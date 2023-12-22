<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
// use Illuminate\Support\Facades\Route;

class CheckCompanyData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('login') || 
        $request->routeIs('company.register') || 
        $request->routeIs('password.request') || 
        $request->routeIs('password.reset') || 
        $request->routeIs('password.email') || 
        $request->routeIs('password.update') ||
        $request->isMethod('post')){
        
        return $next($request);
    }

        if (!Company::exists()) {
            return redirect()->route('company.register');
        }
        return $next($request);
    }
}
