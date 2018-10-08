<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bowler extends Model
{
    protected $fillable = ['totalwc', 'ecrt', 'bb', 'hat', 'hw'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
