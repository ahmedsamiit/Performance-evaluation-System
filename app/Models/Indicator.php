<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = [
        'name',
        'criteria_id',
        'is_positive',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function criteria()
    {
        return $this->belongsTo('App\Criteria');
    }
}
