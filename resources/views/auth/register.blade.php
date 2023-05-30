<!-- resources/views/auth/register.blade.php -->

@extends('layouts.front.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inscription</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('inscription') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmez le mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

