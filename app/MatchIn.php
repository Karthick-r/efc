<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchIn extends Model
{
    protected $fillable = ['user_id', 'year', 'team', 'vsteam', 'teamsc', 'yourscore', 'yourwicket', 'comsc', 'result', 'location'];

    public function user(){

        return $this->belongsTo('App\User');
    } 

    public function organizes(){
        return $this->hasOne('App\Organize');
      }
      public function teams(){
        return $this->belongsTo('App\Team');
      }
}
