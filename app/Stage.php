<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stage'
    ];

    public $timestamps = true;
}
