<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation_cycle extends Model
{
    protected $fillable = [

        'cycle',
        'end',
        'start',


    ];
    protected $hidden = [

        'is_current',

    ];
    public function setUpdatedAt($value)
    {
        return NULL;
    }


    public function setCreatedAt($value)
    {
        return NULL;
    }

}
