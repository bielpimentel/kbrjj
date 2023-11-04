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

    <div class="collapse show" id="menu-torneios">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/dashboard" class="submenu-link link-light text-decoration-none rounded p-2 active">
          <small class="d-flex justify-content-between align-items-center">
            Listagem

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </small>
        </a>
        @can('admin')
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
        @endcan
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
  @can('admin')
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
  @endcan
  
@endsection {{-- OPÇÕES DO MENU LATERAL (FIM) --}}


@section('main')

  {{-- cabeçalho --}}
  <div class="d-flex justify-content-between mb-4">
    <h1 class="h3">Torneios registrados</h1>

    @can('admin')
    <div class="d-flex gap-2">
      <a href="/painel/registro_torneio" class="btn btn-light">+ Cadastrar Torneio</a>
    </div>
    @endcan
  </div>

  @if(session('msg'))
    <div class="msgSucesso">
      <p>{{ session('msg') }}</p>
    </div>
  @endif

  {{-- filtros --}}
  <div class="d-flex justify-content-between align-items-end mb-3">
    <form action="/painel/dashboard" method="GET" class="bg-custom rounded col-12 py-3 px-4">
        
      <div class="row align-items-end row-gap-4">
        <div class="col-3 d-flex flex-wrap">
          <label for="titulo" class="col-form-label">Título:</label>
          <div class="col-12">
            <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo" placeholder="Busca por título">
          </div>
        </div>

        <div class="col-2 d-flex flex-wrap">
          <label for="fase" class="col-form-label">Fase:</label>
          <div class="col-12">
            <select name="fase" class="form-control bg-dark text-light border-dark form-select" id="fase">
              <option value="" disabled selected>Selecione</option>
              <option value="Inscrições Abertas">Inscrições</option>
              <option value="Chaveamento">Chaveamento</option>
              <option value="Resultados">Resultados</option>
            </select>
          </div>
        </div>

        <div class="col-2 d-flex flex-wrap">
          <label for="estado" class="col-form-label">Estado:</label>
          <div class="col-12">
            <select name="estado" class="form-control bg-dark text-light border-dark form-select" id="estado">
              <option value="" disabled selected>Selecione</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
        </div>

        <div class="col-5 row">
          <div class="col-12 col-form-label">Data:</div>

          <div class="col-6 d-flex gap-2">
            <label for="de" class="col-form-label">De:</label>
            <input type="date" class="form-control bg-dark text-light border-dark" id="de" name="de">
          </div>

          <div class="col-6 d-flex gap-2">
            <label for="ate" class="col-form-label">Até:</label>
            <input type="date" class="form-control bg-dark text-light border-dark" id="ate" name="ate">
          </div>
        </div>
            
        <div class="col d-flex justify-content-end">
          <button type="submit" class="btn btn-light w-100">Filtrar</button>
        </div>
      </div>
    </form>
  </div>

  {{-- tabela listagem --}}
  <div class="bg-custom rounded overflow-hidden">
    <table class="table mb-0 table-custom table-dark align-middle">
      <thead>
        <tr>
          <th scope="col" class="text-uppercase">Título</th>
          <th scope="col" class="text-uppercase">Local</th>
          <th scope="col" class="text-uppercase">Fase</th>
          <th scope="col" class="text-uppercase">Data</th>
          <th scope="col" class="text-uppercase">Status</th>
          <th scope="col" class="text-uppercase text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($torneios as $torneio)
          <tr>
            <td><a href="/site/integra/{{$torneio->id}}={{$torneio->titulo}}">{{ $torneio->titulo }}<a></td>
            <td>{{ $torneio->cidade }}-{{ $torneio->estado }}</td>
            <td>{{ $torneio->fase }}</td>
            <td>{{ date('d/m/Y', strtotime($torneio->data)) }}</td>
            @if ($torneio->status == 1)
              <td>Ativo</td>
            @else
              <td>Inativo</td>
            @endif
            <td>
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" data-bs-toggle="modal" data-bs-target="#modal{{ $torneio->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>

                @can('admin')
                  <a href="/painel/edicao_torneio/{{$torneio->id}}" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Editar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path fill="#141618" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                  </a>

                  <form action="/painel/dashboard/{{ $torneio->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Deletar">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path fill="#FFF" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                          <path fill="#FFF" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                      </svg>
                    </button>
                  </form>
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="pagination justify-content-end pt-4 pb-2">
    {{ $torneios->appends([
      'titulo' => request()->get('titulo', ''),
      'fase' => request()->get('fase', ''),
      'estado' => request()->get('estado', ''),
      'de' => request()->get('de', ''),
      'ate' => request()->get('ate', ''),
    ])->links('pagination::bootstrap-4') }}
  </div>

@endsection

@section('modals')
  @foreach ($torneios as $torneio)
    <div class="modal fade" id="modal{{ $torneio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered text-light">
        <div class="modal-content bg-custom">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $torneio->titulo }}</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex flex-wrap row-gap-4">

            <div class="col-6">
              <div><small style="text-decoration: underline">Local:</small></div>
              <div style="color: orange">{{ $torneio->cidade }}-{{ $torneio->estado }}</div>
            </div>

            <div class="col-6">
              <div><small style="text-decoration: underline">Data Prevista:</small></div>
              <div style="color: orange">{{ date('d/m/Y', strtotime($torneio->data)) }}</div>
            </div>

            <div class="col-6">
              <div><small style="text-decoration: underline">Tipo:</small></div>
              <div style="color: orange">{{ $torneio->tipo }}</div>
            </div>

            <div class="col-6">
              <div><small style="text-decoration: underline">Fase:</small></div>
              <div style="color: orange">{{ $torneio->fase }}</div>
            </div>

            <div class="col-6">
              <div><small style="text-decoration: underline">Status:</small></div>
              <div style="color: orange">
                @if ($torneio->status == 1)
                  Ativo
                @else
                  Inativo 
                @endif
              </div>
            </div>

            @can('admin')
            <div class="col-6">
              <div><small style="text-decoration: underline">Data de Registro:</small></div>
              <div style="color: orange">{{ date('d/m/Y, H:i:s', strtotime($torneio->created_at)) }}</div>
            </div>

            <div class="col-6">
              <div><small style="text-decoration: underline">Última Alteração:</small></div>
              <div style="color: orange">{{ date('d/m/Y, H:i:s', strtotime($torneio->updated_at)) }}</div>
            </div>
            @endcan
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection