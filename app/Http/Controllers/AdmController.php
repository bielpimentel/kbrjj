<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneio;
use App\Models\Atleta;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AdmController extends Controller
{

    // ---------- TORNEIOS ---------- //
    public function dashboard(){

        $titulo = request('titulo');
        $fase = request('fase');
        $estado = request('estado');
        $de = request('de');
        $ate = request('ate');

        $query = Torneio::query();

        if($titulo || $fase || $estado || $de || $ate){
            
            $query->where('titulo', 'LIKE', "%{$titulo}%");
            $query->where('fase', 'LIKE', "%{$fase}%");
            $query->where('estado', 'LIKE', "%{$estado}%");
            if($de){
                $query->where('data', '>=', "{$de}");
            }
            if($ate){
                $query->where('data', '<=', "{$ate}");
            }
        }
        
        $dadosTorneio = $query->paginate(4);

        return view('painel.dashboard-adm', [
            'torneios' => $dadosTorneio, 
            'titulo' => $titulo, 
            'fase' => $fase, 
            'estado' => $estado, 
            'de' => $de,
            'ate' => $ate,
        ]);
    }

    public function cadastroTorneio(){

        $dadosTorneio = Torneio::all();

        return view('painel.cadastro-torneio', ['torneios' => $dadosTorneio]);
    }

    public function store(Request $request, Torneio $torneio){

        $query = Torneio::where('titulo', $request->titulo)
                ->where('cidade', $request->cidade)
                ->where('estado', $request->estado)
                ->where('ginasio', $request->ginasio)
                ->where('data', $request->data)
                ->first();

        if ($query){
            return redirect()->back()->with('msg', 'Este torneio já está registrado!');
        }

        $request->validate([
            'titulo' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'data' => 'required|after:today',
            'sobre' => 'required',
            'ginasio' => 'required',
            'infos_gerais' => 'required',
            'tipo' => 'required',
            'fase' => 'required',
            'status' => 'required',
            'imagem' => 'required',
        ], [
            'titulo.required' => 'Campo título é obrigatório!',
            'cidade.required' => 'Campo cidade é obrigatório!',
            'estado.required' => 'Campo Estado é obrigatório!',
            'data.required' => 'Campo data é obrigatório!',
            'data.after' => 'Data inválida!',
            'sobre.required' => 'Campo sobre é obrigatório!',
            'ginasio.required' => 'Campo ginásio é obrigatório!',
            'infos_gerais.required' => 'Campo de informações gerais é obrigatório!',
            'tipo.required' => 'Campo tipo é obrigatório!',
            'fase.required' => 'Campo fase é obrigatório!',
            'status.required' => 'Campo status é obrigatório!',
            'imagem.required' => 'Campo imagem é obrigatório!',
        ]);

        $torneio->titulo = $request->titulo;
        $torneio->cidade = $request->cidade;
        $torneio->estado = $request->estado;
        $torneio->data = $request->data;
        $torneio->sobre = $request->sobre;
        $torneio->ginasio = $request->ginasio;
        $torneio->infos_gerais = $request->infos_gerais;
        $torneio->entrada_publico = $request->entrada_publico;
        $torneio->tipo = $request->tipo;
        $torneio->fase = $request->fase;
        $torneio->status = $request->status;

        // ------- validação/armazenamento de imagem ------- //
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            
            $extensao = $request->imagem->extension();
            $imgName = md5($request->imagem->getClientOriginalName() . strtotime('now')) . ".$extensao";
            $request->imagem->move(public_path('imgs/torneios'), $imgName);
            $torneio->imagem = $imgName;

        }

        $torneio->save();

        return redirect('/painel/dashboard')->with('msg', 'Registro de torneio realizado com sucesso!');

    }

    public function destroy($id) {

        $torneio = Torneio::findOrFail($id);
        if($torneio->imagem && File::exists("imgs/torneios/{$torneio->imagem}")){
            unlink(public_path("imgs/torneios/{$torneio->imagem}"));
        }

        Torneio::findOrFail($id)->delete();

        return redirect('/painel/dashboard')->with('msg', 'Registro de torneio removido!');

    }

    public function edit($id){

        $torneio = Torneio::findOrFail($id);

        return view('painel.edita-torneio', ['torneio' => $torneio]);
    }

    public function update(Request $request){

        $torneio = Torneio::findOrFail($request->id);
        $atualiza = $request->all();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            
            if($torneio->imagem && File::exists("imgs/torneios/{$torneio->imagem}")){
                unlink(public_path("imgs/torneios/{$torneio->imagem}"));
            }
            $extensao = $request->imagem->extension();
            $imgName = md5($request->imagem->getClientOriginalName() . strtotime('now')) . ".$extensao";
            $request->imagem->move(public_path('imgs/torneios'), $imgName);
            $atualiza['imagem'] = $imgName;
        }

        Torneio::findOrFail($request->id)->update($atualiza);

        return redirect('/painel/dashboard')->with('msg', 'Registro de torneio atualizado!');
    }

    public function destaques(){

        $dadosTorneio = Torneio::all();

        return view('painel.destaques', ['torneios' => $dadosTorneio]);
    }

    // ---------- ATLETAS ---------- //
    public function listaAtletas(){

        $nome = request('nome');
        $email = request('email');

        $query = Atleta::query();

        if($nome || $email){
            
            $query->where('nome', 'LIKE', "%{$nome}%");
            $query->where('email', 'LIKE', "%{$email}%");
            
        }
        
        $dadosAtleta = $query->paginate(4);

        return view('painel.lista-atletas', ['atletas' => $dadosAtleta]);
    }

    public function editAtleta($id){

        $atleta = Atleta::findOrFail($id);

        return view('painel.edita-atleta', ['atleta' => $atleta]);
    }

    public function updateAtleta(Request $request){

        $atualiza = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|before:today',
            'equipe' => 'required|max:255',
            'sexo' => 'required',
        ]);

        
        if ($request->filled('cpf')) {
            
            $atualiza['cpf'] = 'required|string|max:14|unique:users,cpf';
        }

        if ($request->filled('email')) {
            
            $atualiza['email'] = 'required|string|max:255|unique:users,email';
        }

        if ($request->filled('senha')) {
            
            $atualiza['senha'] = 'required|string|min:8|confirmed';
            $atualiza['senha'] = bcrypt($atualiza['senha']);
        }

        Atleta::findOrFail($request->id)->update($atualiza);

        return redirect('/painel/atletas')->with('msg', 'Registro de atleta atualizado!');
    }

    public function destroyAtleta($id) {

        Atleta::findOrFail($id)->delete();

        return redirect('/painel/atletas/{id}')->with('msg', 'Registro de atleta removido!');

    }


    // ---------- USUÁRIOS ---------- //
    public function users(){

        $name = request('name');
        $email = request('email');

        $query = User::query();

        if($name || $email){
            
            $query->where('name', 'LIKE', "%{$name}%");
            $query->where('email', 'LIKE', "%{$email}%");
            
        }
        
        $dadosUsers = $query->paginate(4);

        return view('painel.users', ['users' => $dadosUsers]);
    }

    public function cadastroUser(){

        return view('painel.cadastro-users');
    }

    public function storeUser(Request $request){

        $request = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'is_admin' => 'required|boolean',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => $request['is_admin'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/painel/users')->with('msg', 'Usuário cadastrado com sucesso!');
    }

    public function editUser($id){

        $user = User::findOrFail($id);

        return view('painel.edita-user', ['user' => $user]);
    }

    public function updateUser(Request $request){

        $dadosAntigos = User::findOrFail($request->id);

        if ($dadosAntigos->email == $request->email) {
            $atualiza = $request->validate([
                'name' => 'required|string|max:255',
                'is_admin' => 'required|boolean',
            ]);
        } else {
            $atualiza = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,',
                'is_admin' => 'required|boolean',
            ]);
        }

        if ($request->filled('password')) {
            
            $atualiza['password'] = 'required|string|min:8|confirmed';
            $atualiza['password'] = bcrypt($atualiza['password']);
        }

        $dadosAntigos->update($atualiza);

        return redirect('/painel/users')->with('msg', 'Registro de usuário atualizado!');
    }

    public function destroyUser($id) {

        User::findOrFail($id)->delete();

        return redirect('/painel/users')->with('msg', 'Registro de usuário removido!');

    }

}