<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;

class ProfileController extends Controller
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
    public function create(Request $request)
    {
      $this->validate($request, [
             'batsman' => 'required',
             'bowler' => 'required',
             'about' => 'required',
             'wicketkeeper' => 'required',
             'allrounder' => 'required',
      ]);
      if (Profile::where('user_id', Auth::user()->id)->exists()) {
        return response()->json(['Rejected' => Auth::user()->fname." you already have a profile"], 200);

    }
    else{

      $profile = new Profile();

      $profile->batsman = $request->input('batsman');
      $profile->bowler = $request->input('bowler');
      $profile->about = $request->input('about');

      $profile->wicketkeeper = $request->input('wicketkeeper');
      $profile->allrounder = $request->input('allrounder');
      $profile->user_id = Auth::user()->id;
      $profile->save();
      $success = Auth::user()->fname . "profile created Successfully";
       return response()->json(['Sucess' => $success], 200);

    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($profile = Profile::find($id)->where('user_id' ,'=', Auth::user()->id)->first()){

            // 'batsman' => 'required',
            // 'bowler' => 'required',
            // 'about' => 'required',
            // 'wicketkeeper' => 'required',
            // 'allrounder' => 'required',


            $teamname = $profile->batsman;
            $country = $profile->bowler;
            $state =$profile->about ;
            $city = $profile->wicketkeeper;
            $pin = $profile->allrounder;
           
        
        
        return response()->json([
        
                'user_id' => Auth::user()->id,
        'Batsman' =>  $teamname,
        'bowler' => $country,
        'about' => $state,
        'wk' => $city,
        'allrounder' => $pin,
        
        ]);
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
            'batsman' => 'required',
            'bowler' => 'required',
            'about' => 'required',
            'wicketkeeper' => 'required',
            'allrounder' => 'required',
     ]);
   


     $profile =  Profile::find($id)->where('user_id', '=', Auth::user()->id)->first();

     $profile->batsman = $request->input('batsman');
     $profile->bowler = $request->input('bowler');
     $profile->about = $request->input('about');

     $profile->wicketkeeper = $request->input('wicketkeeper');
     $profile->allrounder = $request->input('allrounder');
     $profile->user_id = Auth::user()->id;
     $profile->save();
     $success = Auth::user()->fname . "Your profile edited Successfully";
      return response()->json(['Sucess' => $success], 200);

   
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
