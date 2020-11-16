<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
	protected $guarded = [];
    public function contrats () {
        return $this->hasMany ("App\User");
    }}
