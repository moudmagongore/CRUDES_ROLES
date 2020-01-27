<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;


class RegistersController extends Controller
{
    public function listeUsers()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    
    public function getAddUsers()
    {
        return view('users.create');
    }



    public function postAddUsers(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
        ]);


        $users = User::create([

            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

        //pour donner un role en créant l'utilisateur
        //On recupere l'id du role utilisateur
        $roles = Role::select('id')->where('nom', 'utilisateur')->first();

        //On attache l'id du role utilisateur a notre users
        $users->roles()->attach($roles);


        return redirect()->route('liste-users');
    }


    public function getEditUsers($id)
    {
        //si sa retourne vrai c a d l'user na pas admin dans ses roles
        if (Gate::denies('edit-users')) {

            return redirect()->route('liste-users');
        }

        $users = User::findOrFail($id);

        $roles = Role::all();

        return view('users.edit', compact('users', 'roles'));
    }



    public function postEditUsers(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|min:2',
            'email' => 'required|email',
            /*'password' => 'required|min:4',*/
        ]);


         $users = User::findOrFail($id);

         //On recupere le user, on appel la function roles() qui fait appel a la relation many to many et on utilise la function sync puisqu'on vas lui passer un tableau
         //$request->roles : pour recuperer le role que l'utlisateur à deja
         $users->roles()->sync($request->roles);


         $users->update([

            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            /*'password' => bcrypt($request->password)*/

         ]);

         return redirect()->route('liste-users');
    }


    public function destroy($id)
    {

        //si sa retourne vrai c a d l'user na pas admin ou auteur dans ses roles
        if (Gate::denies('delete-users')) {
            
            return redirect()->route('liste-users');
        }


        //On recupere l'utilisateur
        $user = User::findOrFail($id);

        //on enleve ces relations avec la table roles avant d lui supprimer
        $user->roles()->detach();

        $users = User::destroy($id);

        return redirect()->route('liste-users');
    }


    public function getStatut($id)
    {
        //si sa retourne vrai c a d l'user na pas admin ou auteur dans ses roles
        if (Gate::denies('suspendre-users')) {
            
            return redirect()->route('liste-users');
        }


        $user = User::find($id);

        if($user->statut == 0)
        {
            $user->statut = 1;
        }
        else
        {
            $user->statut = 0;
        }

        $user->save();

        return back();
    }

    
}
