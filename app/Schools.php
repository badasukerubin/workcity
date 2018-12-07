<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'schools';

    protected $fillable = [
        'id','name', 'school', 'type', 'location' , 'created_at', 'updated_at', 'created_by',
    ];
}
