<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'value','cycle_id','user_id' ,'criteria_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

}
