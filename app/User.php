<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'zone', 'password', 'country', 'state', '', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function profile(){
        return $this->hasOne('App\Profile');
    }
    public function score(){
        return $this->hasOne('App\score');
    }
    public function tournamentin(){
        return $this->hasMany('App\TournamentIn');
    }
    public function matchin(){
        return $this->hasMany('App\MatchIn');
    }
    public function bowler(){
        return $this->hasOne('App\Bowler');
    }
    public function team(){
        
        return $this->hasOne('App\Team');
    }
    public function organize()
    
    {
    
    
        return $this->hasMany('App\Organize');
    
    
    }


    public function tournament() {
       
       
        return $this->hasMany('App\Tournament');
         
    
    }

    

}
