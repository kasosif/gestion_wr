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
    protected $guarded = [];

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

    public function contrats () {
        return $this->hasMany("App\User");
    }

    public function humanRole() {
        return $this->role == 'admin' ? 'Administrator' : $this->poste;
    }
    public function fullName(){
        return $this->nom .' '.$this->prenom;
    }
    public function factures() {
        return $this->hasMany('App\Factures','user_id');
    }
}
