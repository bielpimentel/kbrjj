@extends('layouts.painel-main')

@section('user', 'Admin')


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

    <div class="collapse show" id="menu-atletas">
      <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
        <a href="/painel/atletas" class="submenu-link link-light text-decoration-none rounded p-2 active">
          <small class="d-flex justify-content-between align-items-center">
            Listagem
            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
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