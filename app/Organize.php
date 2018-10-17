<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
  protected $fillable = ['user_id', 'matchdate', 'country', 'state', 'city', 'pin', 'whovswho', 'currency', 'entryfee', 'lastdayforpay', 'overs', 'dresscode', 'uniform'];

public function user(){
    return $this->belongsTo('App\User');
}
public function tournament(){
  return $this->belongsTo('App\Tournament');
}


public function matchins(){
  return $this->belongsTo('App\MatchIn');
}
public function teams(){
  return $this->belongsTo('App\Team');
}
}
