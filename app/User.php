<?php

namespace WorkCity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'fullname', 'phonenumber', 'school', 'email', 'password', 'p_id', 'verifyToken','referred_by', 'status', 'ip_address',
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
        return Cache::has('user-is-online-'.$this->id);
    }

}
