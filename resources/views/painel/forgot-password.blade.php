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
  <form method="POST" action="{{ route('password.email') }}" class="form w-100"> 
    @csrf

    <h2 class="h4 text-light">Esqueceu sua senha?</h2>
    <p class="mb-4 text-light fw-light">Apenas digite seu e-mail abaixo e enviaremos um link para ele para redefinir sua senha!</p>

    <div class="row row-gap-3">
      <div class="col-12 form-group text-light">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br" autofocus autocomplete="username">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 mt-3 d-flex gap-2 align-items-center justify-content-between">
        <button type="button" class="btn btn-light">Resetar senha</button>

        <a href="login" class="link-light">Voltar</a>
      </div>
    </div>
  </form>
@endsection