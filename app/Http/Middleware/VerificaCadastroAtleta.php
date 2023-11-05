<?php

namespace App\Http\Middleware;

use App\Models\Atleta;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaCadastroAtleta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userEmail = auth()->user()->email;
        $atletaCadastrado = Atleta::where('email', $userEmail)->first();

        if (!$atletaCadastrado){
            return redirect('/')->with('msg', 'Você não está cadastrado como atleta. Inscreva-se em algum torneio para ter acesso à área do atleta.');
        }
        
        return $next($request);
    }
}
