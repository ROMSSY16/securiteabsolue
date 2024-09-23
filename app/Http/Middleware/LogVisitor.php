<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\Request;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $visitor = VisitorLog::firstOrNew(['ip_address' => Request::ip()]);
        $visitor->user_agent = $request->userAgent();
        $visitor->url = $request->fullUrl();
        $visitor->save();
        
        return $next($request);
    }
}
