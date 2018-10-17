<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['user_id', 'teamname', 'country', 'state', 'city', 'pin', 'players'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }

    public function organizes(){
        return $this->hasMany('App\Organize');
    }


    public function matchins(){
        return $this->hasMany('App\MatchIn');
    }
    public function tournamentins(){
        return $this->hasMany('App\TournamentIn');
    }

    
}
