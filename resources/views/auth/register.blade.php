@extends('layouts.login-adm')

@section('title', 'Cadastrar')

@section('errors')
    <x-validation-errors class="mb-4 text-red-600"/>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
@endsection

@section('forms')
<form method="POST" action="{{ route('register') }}" class="form w-100"> 
    @csrf

    <h2 class="h4 text-light mb-4">Criar Conta</h2>

    <div class="row row-gap-3">

      <div class="col-12 form-group text-light">
        <label for="name">Nome:</label>
        <input type="text" class="form-control bg-dark border-dark text-light" id="name" name="name" placeholder="Digite seu nome" autofocus autocomplete="name">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>  

      <div class="col-12 form-group text-light">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br" autocomplete="username">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 form-group text-light">
        <label for="password">Senha:</label>
        <input type="password" name="password" class="form-control bg-dark border-dark text-light" id="password">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <div class="col-12 form-group text-light">
        <label for="password_confirmation">Confirmar senha:</label>
        <input type="password" name="password_confirmation" class="form-control bg-dark border-dark text-light" id="password_confirmation">
        <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
      </div>

      <a href="{{ route('login') }}" class="link-light"><small>Já sou cadastrado</small></a>

      <div class="d-flex flex-column">
          <button type="submit" class="btn btn-light mt-3">Cadastrar</button>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
