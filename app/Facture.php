<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
	protected $guarded = [];
 	public function client () {
		return $this->belongsTo('App\Client');
	}
 }
