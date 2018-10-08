<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchIn extends Model
{
    protected $fillable = ['user_id', 'year', 'team', 'vsteam', 'teamsc', 'yourscore', 'yourwicket', 'comsc', 'result', 'location'];

    public function user(){

        return $this->belongsTo('App\User');
    } 
}
