<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;



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


        $match = Organize::where('live', '=', 1 )->take(5)->get();
        $matchs = Tournament::where('live', '=', 1 )->take(5)->get();







}











}


