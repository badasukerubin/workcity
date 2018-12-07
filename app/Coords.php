<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class Coords extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'coord';

    protected $table = 'coords';

    protected $fillable = [
        'fullname','username', 'image', 'email', 'password', 'p_id', 'dob', 'school', 'faculty', 'department', 'level', 'cgpa', 'phonenumber', 'work_exp', 'marital', 'location', 'ref_id','created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //The online activity
    public function isOnline()
    {
        return Cache::has('coord-is-online-'.$this->id);
    }
}
