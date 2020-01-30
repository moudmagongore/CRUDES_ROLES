<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['fournisseur_id', 'categorie_id', 'designation', 'prix', 'quantite'];

    public function fournisseur(){
    	return $this->belongsTo('App\Fournisseur');
    }

    public function categorie(){
    	return $this->belongsTo('App\Categorie');
    }


    //Cette function n'est disponible en tant que methode de notre model.  $this->prix pour avoir accès au prix
    public function getprix()
    {
    	$prix = $this->prix / 1000;

    	return number_format($prix, '3', '.', ' ') . ' GNF';
    }
}


