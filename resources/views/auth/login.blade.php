@extends('layouts.login-adm')

@section('title', 'Login')

@section('errors')
    <x-validation-errors class="mb-4 text-red-600"/>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
@endsection

@section('forms')
<form method="POST" action="{{ route('login') }}" class="form w-100"> 
    @csrf

    <h2 class="h4 text-light mb-4">Painel Administrativo</h2>

    <div class="row row-gap-3">
      <div class="col-12 form-group text-light">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br" autofocus autocomplete="username">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 form-group text-light">
        <label for="password">Senha:</label>
        <input type="password" name="password" class="form-control bg-dark border-dark text-light" id="password" autocomplete="current-password">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->

        <a href="{{ route('password.request') }}" class="link-light"><small>Esqueci minha senha</small></a>
      </div>

      <div class="d-flex flex-column">
          <button type="submit" class="btn btn-light mt-3">Entrar</button>
          <a href="{{ route('register') }}" class="btn btn-primary mt-3">Cadastrar</a>
      </div>
    </div>
  </form>
@endsection

{{-- <!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <main class="py-5" style="min-height: calc(100vh - 72px);">
    <div class="container">
        <x-validation-errors class="mb-4 text-red-600"/>

          @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
            </div>
          @endif
      <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
        <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
            <img src="img/kbrtec.webp" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
        </div>

        <div class="col-6 d-flex align-items-center p-5">

          <form method="POST" action="{{ route('login') }}" class="form w-100"> 
            @csrf

            <h2 class="h4 text-light mb-4">Painel Administrativo</h2>

            <div class="row row-gap-3">
              <div class="col-12 form-group text-light">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br" autofocus autocomplete="username">
                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
              </div>

              <div class="col-12 form-group text-light">
                <label for="password">Senha:</label>
                <input type="password" name="password" class="form-control bg-dark border-dark text-light" id="password" autocomplete="current-password">
                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->

                <a href="{{ route('password.request') }}" class="link-light"><small>Esqueci minha senha</small></a>
              </div>

              <div class="col-12">
                  <button type="submit" class="btn btn-light mt-3">Entrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-custom text-light text-center py-4">
      <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html> --}}

{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
