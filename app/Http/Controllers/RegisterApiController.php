<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

use App\Players;

class RegisterApiController extends Controller
{
    public function RegisterApi(Request $request){
        $this->validate($request,
        [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
             'password' => 'required|string|min:6|confirmed',
           
             

 
        ]);

        
  
             $user = new User;
            $user->fname=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->email=$request->input('email');
            $user->password=bcrypt($request->input('password'));
            $user->phone=$request->input('phone');
         
            $user->status=1;
            $user->deleted_on_off=1;
            $user->role_id= 1;
            $user->admin=0;
            $player = new Players;


            $player->players =  $request->fname;

            $player->save();
            $user->save();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->fname;
            $success['id'] = $user->id;
         

       return response()->json(['success'=>$success], 200);
       
                      
    }

public function login(Request $request)
{

    $this->validate($request, [
        'login'    => 'required',
        'password' => 'required',
    ]);
 
    $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
        ? 'email'  
        : 'phone' 
        ;
 
    $request->merge([
        $login_type => $request->input('login')
    ]);
 
    if (Auth::attempt($request->only($login_type, 'password'))) {
        if(Auth::user()->role_id !== 1){
            return response()->json(['error'=>'you are blocked by admin'], 200);
            Auth::user()->AauthAcessToken()->delete();


        }else{
             $user = Auth::user();
             $success['id'] = $user->id;
             $success['name'] = $user->fname;

        $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
    }
}
    else{
        return response()->json(['error'=>'Your input pairs do not match our records'], 200);
    }
}
public function logout()
{ 
    if (Auth::check()) {
       
       
 Auth::user()->AauthAcessToken()->delete();

 return response()->json(['success' => 'You are logged out'],200);

   
}
    
}

}

