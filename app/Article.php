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
}
