<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $guarded = [];

    public function client () {
		return $this->belongsTo('App\Client');
	}

	public function employee() {
		return $this->belongsTo('App\User','employe_id');
	}

	public function typeService() {
		return $this->belongsTo('App\TypeService');
	}
}
