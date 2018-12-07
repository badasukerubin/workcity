<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sponsors';

    protected $fillable = [
        'id', 'image', 'type','location', 'description', 'fullname', 'twitter', 'facebook', 'others', 'user_id', 'to_delete', 'created_at', 'updated_at', 'coord',
    ];
}
