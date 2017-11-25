<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'status';
	
	public function user() {
	    return $this->hasMany('App\User')->withPivot('name');
	}
}
