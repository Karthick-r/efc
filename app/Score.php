<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

protected $fillable = ['user_id', 'highscore', 'avgst', 'century', 'assets', 'outs'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
