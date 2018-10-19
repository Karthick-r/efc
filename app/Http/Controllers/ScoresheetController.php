<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scoresheet;
use Auth;
class ScoresheetController extends Controller
{

    public function __construct()
    {
         return $this->middleware('auth:api');
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $sheet =  new Scoresheet;


        $sheet->match = $request->match;
        $sheet->team1 = $request->team1;
        $sheet->team2 = $request->team2;
        $sheet->t1score = $request->t1score;
        $sheet->t2score = $request->t2score;
        $sheet->t1overs = $request->t1overs;
        $sheet->t2overs = $request->t2overs;
        $sheet->city = $request->city;
        $sheet->tournament = $request->tournament;
        $sheet->totalruns = $request->totalruns;
        $sheet->live = 1;
       

        $sheet->save();

        return response()->json([
            "success" 
        ]);

    }

    public function finished($id)
    {
        
        $sheet = Scoresheet::find($id);


        $sheet->live = 0;


        $sheet->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
