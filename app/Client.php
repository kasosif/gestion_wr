<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];

	public function factures () {
		return $this->hasMany('App\Facture');
	}

	public function contrat () {
		return $this->hasOne('App\Contrat');
	}
}
