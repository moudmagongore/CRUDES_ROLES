<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategoriesController extends Controller
{
	public function listeCategorie()
	{
		$categories = Categorie::all();

		return view('categories.index')->with('categories', $categories);
	}


    public function getCategorie()
    {
    	return view('categories.create');
    }

    public function postCategorie(Request $request)
    {
    	$this->validate($request, [

    		'nom' => 'required|min:2',
            /* Recaptcha*/
            'g-recaptcha-response' => 'required|captcha',
            /* End Recaptcha*/

    	]);
        

    	$categories = Categorie::create([

    		'nom' => $request->nom,
    	]);

   		return redirect()->route('liste-categories');
    }

    public function getEditCategorie($id)
    {
        $categories = Categorie::findOrFail($id);

        return view('Categories.edit')->with('categories', $categories);
    }

    public function postEditCategorie(Request $request, $id)
    {
        $this->validate($request, [

            'nom' => 'required|min:2',
        ]);

        $categories = Categorie::findOrFail($id);

        $categories->update([

            'nom' => $request->nom,
        ]);

        return redirect()->route('liste-categories');
    }

    public function destroyCategorie($id)
    {
        Categorie::destroy($id);

        return redirect()->route('liste-categories');
    }
}
