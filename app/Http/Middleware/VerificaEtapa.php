<?php

namespace App\Http\Middleware;

use App\Models\Torneio;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaEtapa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $torneioId = $request->route('id'); // Obtém o id do torneio da URL
        $torneio = Torneio::find($torneioId);
        $faseTorneio = $torneio->fase;

        if ($faseTorneio !== 'Inscrições Abertas') {
            return redirect("/site/integra/{$torneioId}={$torneio->titulo}")->with('msg', 'Inscrições encerradas :(');
        }

        return $next($request);
    }
}
