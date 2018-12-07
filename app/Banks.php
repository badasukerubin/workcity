<?php

namespace WorkCity;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'banks';

    protected $fillable = [
        'id','name', 'bank', 'created_at', 'updated_at', 'created_by',
    ];
}
