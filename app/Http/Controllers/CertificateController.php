<?php

namespace App\Http\Controllers;

use App\Class\Calendario;
use App\Models\Atleta;
use Illuminate\Http\Request;
use App\Models\Torneio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function certificados(){

        $userEmail = Auth::user()->email;
        $dadosAtleta = Atleta::where('email', $userEmail)->first();
        $dadosTorneio = $dadosAtleta->torneios;

        return view ('area-atleta.restrita', [
            'atleta' => $dadosAtleta, 
            'torneio' => $dadosTorneio
        ]);
    }
}
