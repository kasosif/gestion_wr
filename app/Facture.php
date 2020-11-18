<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
	protected $guarded = [];

 	public function client () {
		return $this->belongsTo('App\Client');
	}

	public function contrat() {
 	    return $this->belongsTo('App\Contrat');
    }

    public function initiator() {
 	    return $this->belongsTo('App\User','user_id');
    }
 }

