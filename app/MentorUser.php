<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorUser extends Model
{

	protected $table = 'mentor_user';

    public function students()
    {
    	return $this->hasOne('App\User')->withPivot('id', 'name_first', 'name_last');
    }
}
