@extends('layouts.painel-main')

@section('user')
  {{ auth()->user()->name }}
@endsection


@section('op') {{-- OPÇÕES DO MENU LATERAL (INCÍCIO) --}}
  {{-- MENU TORNEIOS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-torneios" aria-expanded="true" aria-controls="menu-torneios">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
        </svg>

        Torneios
    </div>

    <div class="collapse" id="menu-torneios">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/dashboard" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
        <a href="/painel/registro_torneio" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Cadastrar
          </small>
        </a>
        <a href="/painel/destaques" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Destaques
          </small>
        </a>
      </div>
    </div>
  </div>
  {{-- MENU ATLETAS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-atletas" aria-expanded="true" aria-controls="menu-atletas">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
        </svg>

        Atletas
    </div>

    <div class="collapse" id="menu-atletas">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/atletas" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
      </div>
    </div>
  </div>
  {{-- MENU USUÁRIOS --}}
  <div class="item">
    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>

        Usuários
    </div>

    <div class="collapse" id="menu-usuario">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/users" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
          </small>
        </a>
        <a href="/painel/cadastro" class="submenu-link link-light text-decoration-none rounded p-2">
          <small class="d-flex justify-content-between align-items-center">
            Cadastrar
          </small>
        </a>
      </div>
    </div>
  </div>
@endsection {{-- OPÇÕES DO MENU LATERAL (FIM) --}}


@section('main')

  {{-- cabeçalho --}}
  <div class="d-flex justify-content-between mb-4">
    <h1 class="h3">Editar Torneio: <span style="color: yellow">{{ $torneio->titulo }}</span></h1>
  </div>

  {{-- forms --}}
  <form action="/painel/edicao_torneio/{{ $torneio->id }}" method="POST" enctype="multipart/form-data" class="bg-custom rounded col-12 py-3 px-4">

    @csrf
    @method('PUT')
    <div class="mb-3 row">
      <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo" placeholder="Nome do torneio" value="{{ $torneio->titulo }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="imagem" class="col-sm-2 col-form-label">Imagem do torneio:</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="imagem" name="imagem" style="color: rgb(240, 206, 145)">
        <img src="/imgs/torneios/{{ $torneio->imagem }}" alt="{{ $torneio->titulo }}" class="mini-img">
      </div>
    </div>
    
    <div class="mb-3 row">
      <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="cidade" name="cidade" placeholder="Cidade do torneio" value="{{ $torneio->cidade }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
      <div class="col-sm-3">
        <select name="estado" class="form-control bg-dark text-light border-dark form-select" id="estado">
          <option value="" disabled selected>Selecione o Estado...</option>
          <option value="AC" {{ $torneio->estado == 'AC' ? 'selected="selected"' : '' }}>Acre</option>
          <option value="AL" {{ $torneio->estado == 'AL' ? 'selected="selected"' : '' }}>Alagoas</option>
          <option value="AP" {{ $torneio->estado == 'AP' ? 'selected="selected"' : '' }}>Amapá</option>
          <option value="AM" {{ $torneio->estado == 'AM' ? 'selected="selected"' : '' }}>Amazonas</option>
          <option value="BA" {{ $torneio->estado == 'BA' ? 'selected="selected"' : '' }}>Bahia</option>
          <option value="CE" {{ $torneio->estado == 'CE' ? 'selected="selected"' : '' }}>Ceará</option>
          <option value="DF" {{ $torneio->estado == 'DF' ? 'selected="selected"' : '' }}>Distrito Federal</option>
          <option value="ES" {{ $torneio->estado == 'ES' ? 'selected="selected"' : '' }}>Espírito Santo</option>
          <option value="GO" {{ $torneio->estado == 'GO' ? 'selected="selected"' : '' }}>Goiás</option>
          <option value="MA" {{ $torneio->estado == 'MA' ? 'selected="selected"' : '' }}>Maranhão</option>
          <option value="MT" {{ $torneio->estado == 'MT' ? 'selected="selected"' : '' }}>Mato Grosso</option>
          <option value="MS" {{ $torneio->estado == 'MS' ? 'selected="selected"' : '' }}>Mato Grosso do Sul</option>
          <option value="MG" {{ $torneio->estado == 'MG' ? 'selected="selected"' : '' }}>Minas Gerais</option>
          <option value="PA" {{ $torneio->estado == 'PA' ? 'selected="selected"' : '' }}>Pará</option>
          <option value="PB" {{ $torneio->estado == 'PB' ? 'selected="selected"' : '' }}>Paraíba</option>
          <option value="PR" {{ $torneio->estado == 'PR' ? 'selected="selected"' : '' }}>Paraná</option>
          <option value="PE" {{ $torneio->estado == 'PE' ? 'selected="selected"' : '' }}>Pernambuco</option>
          <option value="PI" {{ $torneio->estado == 'PI' ? 'selected="selected"' : '' }}>Piauí</option>
          <option value="RJ" {{ $torneio->estado == 'RJ' ? 'selected="selected"' : '' }}>Rio de Janeiro</option>
          <option value="RN" {{ $torneio->estado == 'RN' ? 'selected="selected"' : '' }}>Rio Grande do Norte</option>
          <option value="RS" {{ $torneio->estado == 'RS' ? 'selected="selected"' : '' }}>Rio Grande do Sul</option>
          <option value="RO" {{ $torneio->estado == 'RO' ? 'selected="selected"' : '' }}>Rondônia</option>
          <option value="RR" {{ $torneio->estado == 'RR' ? 'selected="selected"' : '' }}>Roraima</option>
          <option value="SC" {{ $torneio->estado == 'SC' ? 'selected="selected"' : '' }}>Santa Catarina</option>
          <option value="SP" {{ $torneio->estado == 'SP' ? 'selected="selected"' : '' }}>São Paulo</option>
          <option value="SE" {{ $torneio->estado == 'SE' ? 'selected="selected"' : '' }}>Sergipe</option>
          <option value="TO" {{ $torneio->estado == 'TO' ? 'selected="selected"' : '' }}>Tocantins</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="data" class="col-sm-2 col-form-label">Data de realização:</label>
      <div class="col-sm-3">
        <input type="date" class="form-control bg-dark text-light border-dark" id="data" name="data" value="{{ date('Y-m-d', strtotime($torneio->data)) }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="sobre" class="col-sm-2 col-form-label">Sobre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="sobre" name="sobre" value="{{ $torneio->sobre }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="ginasio" class="col-sm-2 col-form-label">Ginásio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="ginasio" name="ginasio" value="{{ $torneio->ginasio }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="infos_gerais" class="col-sm-2 col-form-label">Informações Gerais:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="infos_gerais" name="infos_gerais" value="{{ $torneio->infos_gerais }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="entrada_publico" class="col-sm-2 col-form-label">Entrada ao Público:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control bg-dark text-light border-dark" id="entrada_publico" name="entrada_publico" value="{{ $torneio->entrada_publico }}">
      </div>
    </div>

    <div class="mb-3 row">
      <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
      <div class="col-sm-3">
        <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
          <option value="" disabled selected>Selecione</option>
          <option value="Kimono" {{ $torneio->tipo == 'Kimono' ? 'selected="selected"' : '' }}>Kimono</option>
          <option value="No-GI" {{ $torneio->tipo == 'No-GI' ? 'selected="selected"' : '' }}>No-GI</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="fase" class="col-sm-2 col-form-label">Fase:</label>
      <div class="col-sm-3">
        <select name="fase" class="form-control bg-dark text-light border-dark form-select" id="fase">
          <option value="" disabled selected>Selecione</option>
          <option value="Inscrições Abertas" {{ $torneio->fase == 'Inscrições Abertas' ? 'selected="selected"' : '' }}>Inscrições Abertas</option>
          <option value="Chaveamento" {{ $torneio->fase == 'Chaveamento' ? 'selected="selected"' : '' }}>Chaveamento</option>
          <option value="Resultados" {{ $torneio->fase == 'Resultados' ? 'selected="selected"' : '' }}>Resultados</option>
        </select>
      </div>
    </div>

    <div class="mb-3 row">
      <label for="status" class="col-sm-2 col-form-label">Status:</label>
      <div class="col-sm-3">
        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
          <option value="" disabled selected>Selecione</option>
          <option value="1" {{ $torneio->status == 1 ? 'selected="selected"' : '' }}>Ativo</option>
          <option value="0" {{ $torneio->status == 0 ? 'selected="selected"' : '' }}>Inativo</option>
        </select>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-light">Confirmar Alterações</button>
    </div>
  </form>

@endsection