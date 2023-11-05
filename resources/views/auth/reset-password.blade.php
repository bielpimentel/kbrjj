@extends('layouts.login-adm')

@section('title', 'Alterar Senha')

@section('errors')
    <x-validation-errors class="mb-4 text-red-600"/>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
@endsection

@section('forms')
<form method="POST" action="{{ route('password.update') }}"> 
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <h2 class="h4 text-light mb-4">Atualizar senha</h2>

    <div class="row row-gap-3">
      <div class="col-12 form-group text-light">
        <label for="email">E-mail:</label>
        <input style="background-color: black" type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br" autofocus autocomplete="username">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 form-group text-light">
        <label for="password">Senha:</label>
        <input type="password" name="password" class="form-control bg-dark border-dark text-light" id="password" autocomplete="current-password">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 form-group text-light">
        <label for="password_confirmation">Confirmar senha:</label>
        <input type="password" name="password_confirmation" class="form-control bg-dark border-dark text-light" id="password_confirmation" autocomplete="current-password">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="d-flex flex-column">
          <button type="submit" class="btn btn-light mt-3">Confirmar</button>
      </div>
    </div>
  </form>
@endsection

{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
