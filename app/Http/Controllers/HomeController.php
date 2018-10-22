<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;

use Carbon\Carbon;

use Session;

use App\ChangePoints;

use Illuminate\Support\Facades\Input;


use App\Scoresheet;
use App\Players;

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
        $val = Organize::all()->count();
        $play = Players::all()->count();
        $tour = Tournament::all()->count();
        $team = Team::all()->count();

        
        return view('home')->with('val', $val)->with('play', $play)->with('tour', $tour)->with('team', $team);
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

public function allusers(){
    $user = User::where('role_id', '=', 1)->get();


    return view('userdata')->with('user', $user);
}


public function blocked($id){
    $user = User::find($id);



$user->role_id = 4;

$user->save();

Session::flash('success', 'User blocked');

return redirect()->back();
}
public function showpoints(){
    $change = ChangePoints::find(1);
    

    return view('pointsshow')->with('change', $change);
    
  
    }

public function changenumber(Request $request){

$change = ChangePoints::find(1);

$change->points = $request->points;
$change->rewards = $request->rewards;

$change->save();

Session::flash('success', 'Reward points changed');

return redirect()->back();
}



public function showmat(){
    $team = Team::all();

    return view('showmat')->with('team', $team);
}

public function showtournaments(){
    $tour = Tournament::all();

    return view('showtr')->with('tour', $tour);
}
public function showresults(){
    $org = Organize::all();

    return view('showorg')->with('org', $org);
}


public function vwpro($id){

    $prof = Profile::where('user_id' ,$id)->first();

    return view('vwprof')->with('prof', $prof);



}


public function upcoming(){
    $data = Carbon::now();
    $upcmng = Organize::where('matchdate', '>', $data)->get();

    return view('upcmng')->with('upcmng', $upcmng);



}

}

