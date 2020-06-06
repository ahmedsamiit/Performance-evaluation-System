<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
        'name','type_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
