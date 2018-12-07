<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class Uuser extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user_updated';

    protected $fillable = [
        'id', 'user_id','username', 'image', 'home_address', 'faculty', 'department', 'level', 'bank_name', 'account_name', 'account_number', 'created_at',
    ];
}
