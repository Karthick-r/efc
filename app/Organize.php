<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
  protected $fillable = ['user_id', 'matchdate', 'country', 'state', 'city', 'pin', 'whovswho', 'currency', 'entryfee', 'lastdayforpay', 'overs', 'dresscode', 'uniform'];

public function user(){
    return $this->belongsTo('App\User');
}

}
