<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Team;
use Auth;

use App\Players;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Team::where('user_id', Auth::user()->id)->exists()) {
            return response()->json(['Rejected' => Auth::user()->fname." you already have a Team"], 200);
    
        }
        else{


            $team = Team::create([
"user_id" => Auth::user()->id,
"teamname" =>  $request->teamname,
"country" => $request->country,
"state" => $request->state,
"city" => $request->city,
"pin" => $request->pin,
"players" => "players table",
            ]);

       


        $team->players()->attach($request->players);

    
    
      

        return response()->json([
            'Success' => 'Your Team Created'
        ], 200);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   if($team = Team::find($id)->where('user_id' ,'=', Auth::user()->id)->first()){
    $teamname = $team->teamname;
    $country = $team->country;
    $state = $team->state;
    $city = $team->city;
    $pin = $team->pin;
    $players = "see players table";
   


return response()->json([

        'user_id' => Auth::user()->id,
'teamname' =>  $teamname,
'country' => $country,
'state' => $state,
'city' => $city,
'pin' => $pin,
'players' => $players
], 200);











    }




    else{
        
        return response()->json([
        
            "failed" => "Not your data"
        
            ]);

    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $team = Team::find($id);


        if($team->user_id !== Auth::user()->id){
            return response()->json([
                'Failed' => 'Sorry, You are not allowed'
            ],200); 
        }

        else{


        
        $team->teamname = $request->teamname;

        $team->country = $request->country;
        $team->state = $request->state;
        $team->city = $request->city;
        $team->pin = $request->pin;
        $team->players = $request->players;

        $team->save();

        return response()->json([
            'Success' => 'Your Data updated'
        ],200); 
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
