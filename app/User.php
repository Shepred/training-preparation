<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name_first', 'name_last', 'rating', 'status', 'admin', 'time_trained', 'courses_completed', 'mentor'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function status()
    {
        return $this->belongsToMany('App\Status');
    }
    public function getStatusAttribute()
    {
        return $this->status()->first();
    }

    public function getCurrentMentor()
    {
        $row = DB::table('mentor_user')->where('user_id',  $this->id)->first();
        
        if ($row) {
            $currentMentor = Mentor::findOrFail($row->mentor_id);
            return $currentMentor;
        }

        return null;
    }
    
    public function getMentorAttribute($value)
    {
        //Check mentor attribute, if value is 1 return true, else false.
        return $value == 1 ? true : false;
    }
}