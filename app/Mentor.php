<?php

namespace App;

use DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Mentor extends User
{

	protected $table = 'users';

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope(function ($query) {
			$query->where('mentor', 1);
		});
	}

	public function students() {
	    $rows = DB::table('mentor_user')->where('mentor_id', $this->id)->get();

	    $students = new Collection();
	   	foreach ($rows as $student) {
	   		$students->push(User::withoutGlobalScopes()->findOrFail($student->user_id));
	   	}

	   	return $students;
	}
}
