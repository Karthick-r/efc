<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = ['user_id', 'noofteams', 'tourtype', 'tourentry', 'currency', 'amount', 'lastdayforpay', 'overs', 'dresscode', 'uniform'];


 public function user(){

    return $this->belongsTo('App\User');
}


public function oraganizes(){
    return $this->hasMany('App\Organize');
}


public function users()
{
    return $this->hasMany('App\User');
}
public function teams(){
    return $this->hasMany('App\Team');
}
public function tournamentins(){
    return $this->belongsTo('App\Tournament');
}
}
