<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = ['user_id', 'noofteams', 'tourtype', 'tourentry', 'currency', 'amount', 'lastdayforpay', 'overs', 'dresscode', 'uniform'];

public function user(){
    return $this->belongsTo('App\User');
}

}
