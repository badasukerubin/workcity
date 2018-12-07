<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'types';

    protected $fillable = [
        'id', 'business', 'created_at', 'updated_at',
    ];
}
