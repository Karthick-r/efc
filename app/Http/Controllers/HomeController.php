<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;

use Carbon\Carbon;


use Illuminate\Support\Facades\Input;


use App\Scoresheet;

use App\Tournament;
use Response;
use App\Team;
use App\Organize;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function detail(){
         

        $user = User::find($id)->first()->profile()->first();
        
          


        return response()->json(array('success' => [
            "id" => $user->id,
            'Batsman' =>  $user->batsman,
            'bowler' => $user->bowler,
            'about' => $user->about,
            'wk' => $user->wicketkeeper,
            'allrounder' => $user->allrounder
                    ]));



 


    }


    public function data(){
  

       
        $team = Team::all();
       
       
       
        return response()->json((array('success' => $team)));

        
        
          





 


    }


    public function tour(){
  

        $team = Tournament::all();

        return Response::json(array('success' => $team));





}
    public function dashboard(){


        $valid = Carbon::now();

        $sheet = Scoresheet::where('live', '=', 1 )->take(5)->get();
$data = Organize::where('created_at', '>', $valid)->take(4)->get();
$tour = Tournament::where('created_at', '>', $valid)->take(4)->get();
$scoresheet = array();


$org = array();

$tours = array();

foreach($sheet as $sheets){

    $scoresheet[] = [
        "id" => $sheets->id,
        "team1" => $sheets->team1,
        "team2" => $sheets->team2,
        "t1score" => $sheets->t1score,
        "t2team1" => $sheets->t2team1,
        "t1overs" => $sheets->t1overs,
        "t2overs" => $sheets->t2overs,
        "city" => $sheets->city,
        "city" => $sheets->city,

        
    ];

}

foreach($data as $orgs){
    $org[] = [

        "id" => $orgs->id,
        "team1" => $orgs->whovswho,
        "team2" => $orgs->oppo,
        "venue" => $orgs->venue,
        "date" => reset($orgs->created_at)
        
    ];






}

foreach($tour as $gain){
    $tours[] = [

        "id" => $gain->id,
        "name" => $gain->tourtype,
        "date" => $gain->created_at,
        "venue" => $gain->venue,
        "date" => reset($gain->created_at),
    ];
}



return response()->json([
    "live matches" => 
       $scoresheet
    ,

    "featured matches" => 
        $org
    ,
    "featured tournaments" =>
        $tours
    

]);



}


public function showusers(){

    $user = User::all();

$users = array();


foreach($user as $us){
    $users[] = [
        'id' => $us->id,
        'name' => $us->fname . $us->lname,
        'avatar' => $us->avatar

    ];
}

    return response()->json(
        $users
        
    );



}

public function checknum(){
    
    if(User::where('phone', '=', Input::get('phone'))->count() > 0) {

         return response()->json([

             'result' => 'Mobile number already exists'
         
             ]);

    }



}


}

