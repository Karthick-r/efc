<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentIn extends Model
{
    protected $fillable = ['user_id', 'tournament', 'year', 'noofinnings', 'totalsc'  , 'totalwc', 'total', 'awards', 'location'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
