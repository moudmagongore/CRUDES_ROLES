<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Fournisseur;
use App\Article;

class ArticlesController extends Controller
{
	public function index()
	{
		$articles = Article::all();

		return view('Articles.index', compact('articles'));
	}



    public function getArticle()
    {
    	$categories = Categorie::all();
    	$fournisseurs = Fournisseur::all();

    	return view('Articles.create', compact('categories', 'fournisseurs'));
    }



    public function postArticle(Request $request)
    {
    	$this->validate($request, [
            'designation' => 'required|min:2',
            'prix' => 'required|min:1',
            'quantite' => 'required|min:1',
        ]);

        $articles = Article::create([

        	'fournisseur_id' => $request->fournisseur,
        	'categorie_id' => $request->categorie,
        	'designation' => $request->designation,
        	'prix' => $request->prix,
        	'quantite' => $request->quantite,

        ]);

        return redirect()->route('liste-articles');

    }



    public function getEditArticle($id)
    {
        $articles = Article::findOrFail($id);

        $fournisseurs = Fournisseur::all();
        $categories = Categorie::all();

        return view('Articles.edit', compact('articles','fournisseurs', 'categories'));
    }



    public function postEditArticle(Request $request, $id)
    {
        $articles = Article::findOrFail($id);

        $this->validate($request, [
            'designation' => 'required|min:2',
            'prix' => 'required|min:1',
            'quantite' => 'required|min:1',
        ]);

        $articles->update([

            'fournisseur_id' => $request->fournisseur,
            'categorie_id' => $request->categorie,
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
        ]);

        return redirect()->route('liste-articles');
    }


    public function destroy($slug)
    {
        Article::destroy($slug);

        return redirect()->route('liste-articles');
    }
}
