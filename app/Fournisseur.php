<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['nom', 'prenom'];

    public function articles(){
    	return $this->hasMany('App\Article');
    }
}
