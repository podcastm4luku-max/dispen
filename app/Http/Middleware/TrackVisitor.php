<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Only track GET requests to front-end (avoid API, Admin panel, etc if desired, but general is fine)
        if ($request->isMethod('GET') && !$request->is('admin/*') && !$request->is('login') && !$request->is('dashboard')) {
            Visitor::firstOrCreate([
                'ip_address' => $request->ip(),
                'date' => Carbon::today()->toDateString(),
            ]);
        }
        return $next($request);
    }
}
