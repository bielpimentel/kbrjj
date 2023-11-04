<?php

namespace App\Http\Controllers;

use App\Class\Calendario;
use App\Models\Atleta;
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

    public function inscricao($id){

        $dadosTorneio = Torneio::findOrFail($id);

        return view('site.inscricao', ['torneio' => $dadosTorneio]);
    }

    public function storeInscricao($id, Request $request, Atleta $atleta){

        Torneio::findOrFail($id);

        $email = auth()->user()->email;
        $password = auth()->user()->password;

        $request->validate([
            'nome' => 'required',
            'nascimento' => 'required|before:today',
            'cpf' => 'required|unique:atletas,cpf',
            'sexo' => 'required',
            'equipe' => 'required',
            'faixa' => 'required',
            'peso' => 'required',
        ], [
            'nome.required' => 'Campo nome é obrigatório!',
            'cpf.required' => 'Campo CPF é obrigatório!',
            'cpf.unique' => 'CPF já cadastrado!',
            'nascimento.required' => 'Campo data é obrigatório!',
            'nascimento.before' => 'Data inválida!',
            'sexo.required' => 'Campo sexo é obrigatório!',
            'equipe.required' => 'Campo equipe é obrigatório!',
            'faixa.required' => 'Campo faixa é obrigatório!',
            'peso.required' => 'Campo peso é obrigatório!',
        ]);

        $checaEmail = Atleta::where('email', $email)->first();

        if ($checaEmail) {
            return redirect()->back()->with('msg', 'Você já possui um cadastro ativo neste torneio com essa conta!');
        }

        $atleta->nome = $request->nome;
        $atleta->nascimento = $request->nascimento;
        $atleta->cpf = $request->cpf;
        $atleta->sexo = $request->sexo;
        $atleta->email = $email;
        $atleta->senha = $password;
        $atleta->equipe = $request->equipe;
        $atleta->faixa = $request->faixa;
        $atleta->peso = $request->peso;

        $atleta->save();

        $atletaInscrito = Atleta::where('cpf', $request->cpf)->first();
        $atletaInscrito->torneios()->attach($id);

        return redirect('/')->with('msg', 'Inscrição realizada com sucesso! Acesse a área do competidor para saber mais detalhes');
    }

    public function chave_integra(){
        return view('site.chave_integra');
    }

    public function chave_listagem(){
        return view('site.chave_listagem');
    }
}
