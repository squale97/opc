<!-- resources/views/auth/register.blade.php -->

@extends('layouts.front.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Se connecter</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login_user') }}">
                            @csrf

                         

                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div> 

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            
                                <a class="btn btn-link" href="{{ route('register') }}">
                                        S'inscrire
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
