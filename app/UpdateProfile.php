<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class UpdateProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_updated';

    protected $fillable = [
        'user_id','username', 'image', 'home_address', 'faculty', 'department', 'level', 'HOD', 'dean_name', 'bank_name', 'account_name', 'account_number', 'description','que_edited',
    ];
}
