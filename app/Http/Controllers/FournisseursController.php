<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;

class FournisseursController extends Controller
{
   
    public function listeFournisseur()
    {
    	$fournisseurs = Fournisseur::all();

    	return view('Fournisseurs.index')->with('fournisseurs', $fournisseurs);
    }

    public function getAddFournisseur()
    {
    	return view('Fournisseurs.create');
    }

    public function postAddFournisseur(Request $request)
    {
    	$this->validate($request, [

    		'nom' => 'required|min:2',
    		'prenom' => 'required|min:2'

    	]);

    	$fournisseurs = Fournisseur::create([

    		'nom' => $request->nom,
    		'prenom' => $request->prenom,

    	]);

    	return redirect()->route('liste-fournisseurs');
    }

    public function getEditFournisseur($id)
   	{
    	$fournisseurs = Fournisseur::findOrFail($id);

    	return view('Fournisseurs.edit')->with('fournisseurs', $fournisseurs);
   	}

   	public function postEditFournisseur(Request $request, $id)
   	{

   		$this->validate($request, [

    		'nom' => 'required|min:2',
    		'prenom' => 'required|min:2'

    	]);

    	$fournisseurs = Fournisseur::findOrFail($id);

    	$fournisseurs->update([

    		'nom' => $request->nom,
    		'prenom' => $request->prenom,

    	]);

   		return redirect()->route('liste-fournisseurs');

   	}


   	public function destroy($id)
   	{
   		Fournisseur::destroy($id);

   		return redirect()->route('liste-fournisseurs');
   	}
}
