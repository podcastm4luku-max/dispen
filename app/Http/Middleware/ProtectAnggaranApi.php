<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtectAnggaranApi
{
    public function handle(Request $request, Closure $next): Response
    {
        $pass = $request->header('X-Anggaran-Password');
        
        // Cek hardcoded password atau sesuaikan kebutuhan
        if ($pass !== 'disdikbud2026') {
            return response()->json(['error' => 'Unauthorized. Password salah atau tidak ada.'], 401);
        }

        return $next($request);
    }
}

