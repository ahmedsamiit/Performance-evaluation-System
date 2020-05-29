<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Indcator extends Model
{
    protected $fillable = [
        'value','cycle_id','user_id' ,'indicator_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

}
