<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class OauthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }



    public function register(Request $request)
    {
        // Valider les données du formulaire d'inscription
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Créer un nouvel utilisateur
        User::create([
            //'id'=> 1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Rediriger l'utilisateur vers une page de réussite ou de connexion
        return redirect('/')->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }

    public function showLoginForm()
    {
        return view('auth.login2');
    }

    public function login_user(Request $request)
    {
        // Valider les données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       // return view('front-office.pages.dashboard');

        // Tenter l'authentification de l'utilisateur
        if (auth()->attempt($credentials)) {
            // Connexion réussie, rediriger l'utilisateur vers une page de réussite
            return redirect()->route('demandesfront');
        } else {
            // Échec de la connexion, rediriger l'utilisateur vers la page de connexion avec un message d'erreur
            return redirect()->route('login-page')->with('error', 'Identifiants invalides');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
