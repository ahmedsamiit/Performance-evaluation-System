<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation_cycle extends Model
{
    protected $fillable = [

        'cycle',
        'is_current',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
