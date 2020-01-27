<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('login.connexion');
    }

    public function postLogin()
    {
    	request()->validate([

    		'email' => ['required', 'email'],
    		'password' => ['required', ],

    	]);

    	$resultat = auth()->attempt([

    		'email' => request('email'),
    		'password' => request('password'),
    	]);

    	$user = Auth::user();

    	if($resultat)
    	{
    	 	if($user->statut == 1)
    	 	{
                flash('Vous êtes bien connecté.')->success();
    	 		return redirect()->route('accueil');
    	 	}

            /*withInput renvoie a la page precedente avec les données saisie par le user*/
    	 	return back()->withInput()->with('danger', 'Vous êtes suspendus.');
    	 }


    	return back()->withInput()->with('danger', 'Vos identifiants sont incorrects.');
    	
    }

    

    public function deconnexion()
    {
    	Auth()->logout();

        flash('Vous êtes déconnecté.')->success();

    	return redirect()->route('login');

    }
}
