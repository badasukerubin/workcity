<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'login_activities';

    protected $fillable = [
        'id', 'subject', 'url', 'method', 'user_id', 'user_agent', 'ip_address', 'created_at', 'updated_at', 'p_id',
    ];
}
