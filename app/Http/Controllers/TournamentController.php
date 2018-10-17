<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use Auth;

use App\User;


class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->validate($request, [
          
            'user_id' => 'required',
            'noofteams' => 'required',
            'tourtype' => 'required',
            'tourentry' => 'required',
            'currency' => 'required|integer',
            'amount' => 'required',
            'lastdayforpay' => 'required',
            'overs' => 'required',
            'dresscode' => 'required',
            'uniform' => 'required',

        ]);

$tour = new Tournament;

$tour->user_id = Auth::user()->id;
$tour->noofteams = $request->noofteams;
$tour->tourtype = $request->tourtype;
$tour->currency = $request->currency;
$tour->tourentry = $request->tourentry;
$tour->amount = $request->amount;
$tour->lastdayforpay = $request->lastdayforpay;
$tour->overs = $request->overs;
$tour->dresscode = $request->dresscode;
$tour->uniform = $request->uniform;


$tour->save();

return response()->json([
'Success' => 'Tournament Created SuccessFully'
]);



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
     
if($tour = Tournament::find($id)->where('user_id', Auth::user()->id)->get()){



   $noofteams = $tour->noofteams;
   $tourtype = $tour->tourtype;

   $tourentry = $tour->tourentry;
   
   $currency = $tour->currency;


   $amount = $tour->amount;
$lastdayforpay = $tour->lastdayforpay;

$overs = $tour->overs;


$dresscode = $tour->dresscode;

$uniform = $tour->uniform;

return response()->json([

"user" => Auth::user()->fname,
"number of teams"  => $noofteams,
"Tournament type"  => $tourtype,
"Entry fee" => $tourentry,
"currency" => $currency,
"amount" => $amount,
"lastdayforpay" => $lastdayforpay,
 "overs" => $overs,
 "dresscode" => $dresscode,
 "uniform" => $uniform


    ]);
   



}
else{
    return response()->json([ 'Error' => 'Not your data' ], 200);


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
        $this->validate($request, [
          
            'user_id' => 'required',
            'noofteams' => 'required',
            'tourtype' => 'required',
            'tourentry' => 'required',
            'currency' => 'required|integer',
            'amount' => 'required',
            'lastdayforpay' => 'required',
            'overs' => 'required',
            'dresscode' => 'required',
            'uniform' => 'required',


        ]);

$tour = Tournament::find($id);

$tour->user_id = Auth::user()->id;
$tour->noofteams = $request->noofteams;
$tour->tourtype = $request->tourtype;
$tour->currency = $request->currency;
$tour->tourentry = $request->tourentry;
$tour->amount = $request->amount;
$tour->lastdayforpay = $request->lastdayforpay;
$tour->overs = $request->overs;
$tour->dresscode = $request->dresscode;
$tour->uniform = $request->uniform;


$tour->save();

return response()->json([
'Success' => 'Tournament updated SuccessFully'
]);

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
