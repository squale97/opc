{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


@extends('layouts.app')
@section('css')


@endsection


@section('log-content')

<div class="page">
    <div class="">
        <!-- CONTAINER OPEN -->
        <div class="col col-login mx-auto">
            <div class="text-center">
                <img src="../../assets/images/brand/logo-3.png" class="header-brand-img" alt="logo">
            </div>
        </div>
        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <form  method="POST" action="{{ route('register')}}">
                    @csrf
                    <span class="login100-form-title">
                        Registration
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" :value="old('name')" placeholder="Nom complet" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="8" opacity=".3" r="2.1"/><path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3"/><path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z"/></svg>
                        </span>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100"  type="email" name="email" :value="old('email')" required placeholder="Adresse email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                        </span>
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
                        </span>
                         @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <label class="custom-control custom-checkbox mt-4">
                        {{-- <input type="checkbox" class="custom-control-input"> --}}
                        <span class="custom-control-label">Accepter les  <a href="#">conditions et la politique</a></span>
                    </label>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn btn-primary">
                            S'inscrire
                        </button>
                    </div>
                    <div class="text-center pt-3">
                        <p class="text-dark mb-0">Vous avez déjà un compte ?<a href="{{route('login')}}" class="text-primary ml-1">Connectez-vous</a></p>
                    </div>
                    {{-- <div class=" flex-c-m text-center mt-3">
                        <p>Or</p>
                        <div class="social-icons">
                            <ul>
                                <li><a class="btn  btn-social btn-block btn-google"><i class="fa fa-google-plus"></i> Sign up with Google</a></li>
                                <li><a class="btn  btn-social btn-block mt-2 btn-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>

@endsection


@section('js')

@endsection