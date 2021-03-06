<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Bowler;
use DB;
use App\Tournament;
use App\TournamentIn;
use App\MatchIn;
use Auth;
use App\Score;
class EditProfileController extends Controller
{

    public function __construct(){
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
      $profile->allrounder = $request->input('wicketkeeper');

      $profile->wicketkeeper = $request->input('wicketkeeper');
      
         $profile->zone = $request->input('zone');
$profile->country = $request->input('country');
$profile->city = $request->input('city');
$profile->pincode = $request->input('pincode');
$profile->avatar = $request->input('avatar');
$profile->dob = $request->input('dob');
$profile->gender = $request->input('gender');
      $profile->user_id = Auth::user()->id;
      $profile->save();
      
      $tour = new Tournament;
      $tour->user_id = Auth::user()->id;
      $tour->save();
 

$tour_ins = new TournamentIn;

$tour_ins->user_id = Auth::user()->id;


$tour_ins->save();


$bow  = new Bowler;

$bow->user_id = Auth::user()->id;
      
$bow->save();


$scr = new Score;
$scr->user_id = Auth::user()->id;
$scr->save();

$matchins = new Matchin;

$matchins->user_id = Auth::user()->id;
$matchins->save();


 

  $success = Auth::user()->fname . " profile created Successfully";
    return response()->json(['Success' => $success], 200);

    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)


    {

        
        if($profile = Profile::where('user_id' , $user_id)->first()){

            if($profile->user_id !== Auth::user()->id){
                return response()->json([
                
                    "failed" => "not your data"
                
                    ]);

            }else{

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
             $zone = $profile->zone ;
             $countrys = $profile->country;
             $citys = $profile->city; 
           $pincode = $profile->pincode;
         $avatars = $profile->avatar;
          $dobs = $profile->dob;
            $genders = $profile->gender;
           $get =  DB::table('tournament_ins')
           ->where('user_id',Auth::user()->id)->first();   
           
           
           $bowlers =  DB::table('bowlers')
           ->where('user_id',Auth::user()->id)->first();
              
           $tours =  DB::table('tournaments')
           ->where('user_id',Auth::user()->id)->first();
            
           $ms = DB::table('match_ins')->where('user_id',  Auth::user()->id)->get();
           $ts = DB::table('tournament_ins')->where('user_id',  Auth::user()->id)->get();

           $scrs =  DB::table('scores')
           ->where('user_id',Auth::user()->id)->first();
$value  = array();
$value1 = array();
foreach( $ms as $mss){


           $value[] = [
            'id' => $mss->id,
           'team' => $mss->team,
           'versus' => $mss->vsteam,
           'team score' => $mss->teamsc,
           'your score' => $mss->yourscore,
           'your wicket' => $mss->yourwicket,
           'opponent score' => $mss->comsc,

           'result' => $mss->result,
           'location' => $mss->location,

          'date' => $mss->created_at
        
          
           ];


}
foreach( $ts as $mss){


    $value1[] = [
        
    'awards' =>   $mss->awards,
     'awardsname' => $mss->awardsname

    ];  


}


        return response()->json([
        
                'user_id' => Auth::user()->id,
                "name"=> Auth::user()->fname,
                "total_rewards" =>Auth::user()->points,
                "total_matches"=> $get->noofinnings,
                "total_wickets"=> $get->totalwc,
                    "total_runs"=> $get->totalsc,

                "img_url" => $avatars,
                "info" => [
                  "dob" => $dobs,
                 "place" => $citys,
                 'Batsman' =>  $teamname,
                  'bowler' => $country,
                'about' => $state,
               'wk' => $city,
        "pincode" => $pincode,
      "country" => $countrys,
     "gender" => $genders,
    'allrounder' => $pin,

                ],

                "batsman" =>[
                    

                    "high score" => $scrs->highscore,
                    "average strike rate" => $scrs->avgst,
                    "half century" => $scrs->fifty,
                    "century" => $scrs->century,
                    "fours" => $scrs->fours,
                    "sixes" => $scrs->assets

                    
                ],
                "bowler" =>[


                    'bowler' => $country,
                    "total_wickets"=> $bowlers->totalwc,
                    "economy" => $bowlers->ecrt,
                    "best bowling" => $bowlers->bb,
                    "hatricks" => $bowlers->hat,
                     "how wickets" => $bowlers->hw

                         
                ],
                "tournament" => $tours->tourtype,
                
                "match_insghts" => 
                    
                    $value
                
                ,
            "awards" =>

                $value1


       

        
        ]);

            }
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $app = Profile::find($id);


        $app->delete();

        
    }

    public function update(Request $request, $user_id)
    {

    
        $this->validate($request, [
            'batsman' => 'required',
            'bowler' => 'required',
            'about' => 'required',
            'wicketkeeper' => 'required',
            'allrounder' => 'required',
     ]);
   


     $profile =  Profile::where('user_id', $user_id)->first();

     $profile->batsman = $request->input('batsman');
     $profile->bowler = $request->input('bowler');
     $profile->about = $request->input('about');

     $profile->wicketkeeper = $request->input('wicketkeeper');
     $profile->allrounder = $request->input('allrounder');
     $profile->user_id = Auth::user()->id;
     $profile->save();
     $success = Auth::user()->fname . "Your profile edited Successfully";
      return response()->json(['Success' => $success], 200);

   
    }
}

