<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

/**
 * Intercepts every request before routing so the whole site renders nothing
 * but the maintenance page, regardless of which route (including ones
 * registered by packages such as Fortify) would otherwise have matched.
 */
class EnsureSiteIsUnderMaintenance
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('up')) {
            return $next($request);
        }

        return Inertia::render('maintenance')->toResponse($request);
    }
}
