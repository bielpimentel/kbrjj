<?php

namespace App\Http\Controllers;

use App\Class\Calendario;
use App\Models\Atleta;
use Illuminate\Http\Request;
use App\Models\Torneio;
use Illuminate\Support\Facades\DB;

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

        $query = Torneio::query()->where('status', '=', 1);

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

    public function storeInscricao($id, Request $request){

        Torneio::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'nascimento' => 'required|before:today',
            'cpf' => 'required',
            'sexo' => 'required',
            'equipe' => 'required',
            'faixa' => 'required',
            'peso' => 'required',
            ], [
            'nome.required' => 'Campo nome é obrigatório!',
            'cpf.required' => 'Campo CPF é obrigatório!',
            'nascimento.required' => 'Campo data é obrigatório!',
            'nascimento.before' => 'Data inválida!',
            'sexo.required' => 'Campo sexo é obrigatório!',
            'equipe.required' => 'Campo equipe é obrigatório!',
            'faixa.required' => 'Campo faixa é obrigatório!',
            'peso.required' => 'Campo peso é obrigatório!',
        ]);

        $user = auth()->user();
        $userEmail = $user->email;
        $userPassword = $user->password;

        $atletaCadastrado = Atleta::where('email', $userEmail)->first();
        
        if ($atletaCadastrado) {

            $atletaInscrito = DB::table('atleta_torneio')->where('atleta_id', $atletaCadastrado->id)->where('torneio_id', $id)->exists();
            
            if ($atletaInscrito ) {
                return redirect()->back()->with('msg', 'Você já está inscrito neste torneio.');
            }
        } else {
            
            $request->validate([
                'cpf' => 'unique:atletas,cpf',
                ], [
                'cpf.unique' => 'CPF já cadastrado como atleta!'
            ]);
    
            $atleta = new Atleta();
            $atleta->nome = $request->nome;
            $atleta->nascimento = $request->nascimento;
            $atleta->cpf = $request->cpf;
            $atleta->sexo = $request->sexo;
            $atleta->email = $userEmail;
            $atleta->senha = $userPassword;
            $atleta->equipe = $request->equipe;
            $atleta->save();
            
            $atletaCadastrado = $atleta;
        }       
    
        $atletaCadastrado->torneios()->attach($id);
    
        return redirect('/')->with('msg', 'Inscrição realizada com sucesso! Acesse a área do competidor para saber mais detalhes');
    }

    public function chave_integra(){
        return view('site.chave_integra');
    }

    public function chave_listagem(){
        return view('site.chave_listagem');
    }
}
