<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';

    protected $table = 'admins';

    protected $fillable = [
        'fullname','username', 'phonenumber', 'school', 'email', 'password', 'p_id',
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
        return Cache::has('admin-is-online-'.$this->id);
    }
}
