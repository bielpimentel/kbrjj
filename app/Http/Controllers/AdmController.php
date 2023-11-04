<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneio;
use App\Models\Atleta;
use App\Models\Usuario;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AdmController extends Controller
{

    // ---------- TORNEIOS ---------- //
    public function dashboard(){

        $dadosTorneio = Torneio::paginate(10);
        $dadosAtleta = Atleta::all();
        $dadosUsuario = Usuario::all();

        return view('painel.dashboard-adm', ['torneios' => $dadosTorneio, 'atletas' => $dadosAtleta, 'usuarios' => $dadosUsuario]);
    }

    public function cadastroTorneio(){

        $dadosTorneio = Torneio::all();
        $dadosUsuario = Usuario::all();

        return view('painel.cadastro-torneio', ['torneios' => $dadosTorneio, 'usuarios' => $dadosUsuario]);
    }

    public function store(Request $request, Torneio $torneio){

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
        $dadosUsuario = Usuario::all();

        return view('painel.destaques', ['torneios' => $dadosTorneio, 'usuarios' => $dadosUsuario]);
    }

    // ---------- ATLETAS ---------- //
    public function listaAtletas(){

        $dadosTorneio = Torneio::all();
        $dadosAtleta = Atleta::all();
        $dadosUsuario = Usuario::all();

        return view('painel.lista-atletas', ['torneios' => $dadosTorneio, 'atletas' => $dadosAtleta, 'usuarios' => $dadosUsuario]);
    }

    // ---------- USUÁRIOS ---------- //
    public function users(){

        $dadosUsuario = Usuario::all();

        return view('painel.users', ['usuarios' => $dadosUsuario]);
    }

    public function cadastroUser(){

        $dadosUsuario = Usuario::all();

        return view('painel.cadastro-users', ['usuarios' => $dadosUsuario]);
    }

}