
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Connexion</div>

                    <div class="card-body">
                        
                            <div class="alert alert-danger">
                                <ul>
                                   
                                </ul>
                            </div>
                     

                        <form method="POST" action="{{ route('login_user') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Connexion</button>
                                <a href="{{ route('register') }}" class="btn btn-link">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

