<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil()
    {
    	return view('Compte.accueil');
    }



    public function modificationMotDePasse()
    {
    	request()->validate([

            'password' => ['required', 'confirmed', 'min:4'],
            'password_confirmation' => ['required'],
        ]);


    	Auth()->User()->update([

    		'password' => bcrypt(request('password')),
    	]);

    	 flash("Votre mot de passe a bien été mis à jour.")->success(); 

    	 return redirect()->route('mon-compte');
    }


    public function modificationAvatar()
    {
    	request()->validate([

            'avatar' => ['required', 'image'],
        ]);

        $path = request('avatar')->store('avatars', 'public');

        auth()->user()->update([

            'avatar'=>$path,
        ]);

        flash("Votre avatar à bien été mis à jour !")->success();

        return back();
    }
}
