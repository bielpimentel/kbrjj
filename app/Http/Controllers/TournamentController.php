<?php

namespace App\Http\Controllers;

use App\Class\Calendario;
use Illuminate\Http\Request;
use App\Models\Torneio;

class TournamentController extends Controller
{

    /* ---------- ÁREA PÚBLICA ---------- */

    public function index(Calendario $datas){

        $dadosTorneios = Torneio::all()
            ->where('status', '=', 1)
        ;

        $dadosOrdenados = Torneio::orderBy('created_at', 'desc')
            ->where('status', '=', 1)
            ->limit(8)
            ->get()
        ;
        
        return view('home', [
            'torneios' => $dadosTorneios, 
            'datas' => $datas, 
            'ordenado' => $dadosOrdenados, 
        ]);
    }

    public function torneios(Calendario $datas){

        $titulo = request('titulo');
        $tipo = request('tipo');
        $estado = request('estado');
        $cidade = request('cidade');

        $query = Torneio::query()
            ->where('status', '=', 1)
        ;

        if($titulo || $tipo || $estado || $cidade){
            $query->where('titulo', 'LIKE', "%{$titulo}%");
            $query->where('tipo', 'like', "%{$tipo}%");
            $query->where('estado', 'like', "%{$estado}%");
            $query->where('cidade', 'like', "%{$cidade}%");
        }

        $dadosPaginados = $query->paginate(4);

        return view('site.torneios', [
            'torneios' => $dadosPaginados, 
            'datas' => $datas, 
            'buscaTitulo' => $titulo, 
            'buscaTipo' => $tipo, 
            'buscaEstado' => $estado, 
            'buscaCidade' => $cidade
        ]);
    }

    public function resultados(){
        return view('site.resultados');
    }

    public function integra($id, Calendario $datas){

        $dadosTorneio = Torneio::findOrFail($id);

        return view('site.integra', [
            'torneios' => $dadosTorneio, 
            'datas' => $datas
        ]);
    }

    public function inscricao(){
        return view('site.inscricao');
    }

    public function chave_integra(){
        return view('site.chave_integra');
    }

    public function chave_listagem(){
        return view('site.chave_listagem');
    }
}
