<?php

namespace App\Http\Controllers;
use Auth;
use App\TournamentIn;
use Illuminate\Http\Request;

class TournamentInController extends Controller
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
        TournamentIn::create([
            'user_id' => Auth::user()->id,
               'tournament' => $request->tournament,
               'year' => $request->year,
               'noofinnings' => $request->noofinnings,
               'totalsc' => $request->totalsc,
               'totalwc' => $request->totalwc,
               'awards' => $request->awards,
               'location' => $request->location,
               
        ]);
        return response()->json([
            'Success' => 'Tournament insight data updated'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($team = TournamentIn::find($id)->where('user_id' ,'=', Auth::user()->id)->first()){
          
            $tour = $team->tournament;
            $year = $team->year;
            $noofins = $team->noofinnings;
            $totalss = $team->totalsc;
            $totalwc = $team->totalwc;
            $awards = $team->awards;
            $location = $team->location;

            return response()->json(array(
                "sucesss" => [

      "tournament" =>  $tour,
      "year" => $year,
      "No of innings" => $noofins,
      "total score" => $totalss,
      "total wickets" => $totalwc,
      "awards" => $awards,
      "location" => $location
                ]
            ));

 

        }

        else{

            return response()->json([

      "Failure" => "Hmm.. Try yours!!"

            ]);


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($team = TournamentIn::find($id)->where('user_id' ,'=', Auth::user()->id)->first()){

            $team->tournament = $request->tournament;
            $team->year = $request->year;
            $team->noofinnings =  $request->noofinnings;
            $team->totalsc = $request->totalsc;
            $team->totalwc = $request->totalwc;
            $team->awards =  $request->awards;
            $team->location = $request->location;
            $team->save();

            return response()->json([

                "Success" => "Edited Successfully"
          
                      ]);


        }
        else{
            return response()->json([

                "Failure" => "Data requested is not Yours"
          
                      ]);

        }


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
