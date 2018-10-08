<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['user_id', 'teamname', 'country', 'state', 'city', 'pin', 'players'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
