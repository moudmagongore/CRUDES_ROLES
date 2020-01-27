<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'telephone', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    //si la ligne renvoie true on return vrai si non faux
    //$this->roles() pour acceder au role
    //where parcq on cherche une seule valeurs a la clé nom
    public function isAdmin()
    {
        return $this->roles()->where('nom', 'admin')->first();
    }

    public function hasAnyRole(array $roles)
    {
        //whereIn parcq on cherche plusieurs valeurs a la clé nom
        return $this->roles()->whereIn('nom', $roles)->first();
    }

}
