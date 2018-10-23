<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [
    'uses' => 'RegisterApiController@RegisterApi',
    'as' => 'register.api'
    ]);
    
    Route::post('/login', [
        'uses' => 'RegisterApiController@login',
        'as' => 'login.api'
        ]);
        Route::post('/logout', [
            'uses' => 'RegisterApiController@logout',
            'as' => 'logout.api'
            ]);
        
        Route::post('/profile', [
            'uses' => 'EditProfileController@create',
            'as' => 'profile.api'
            ]);
            
            
            Route::get('/profile/{user_id}', [
                'uses' => 'EditProfileController@show',
                'as' => 'showe.api'
                ]);
             
             
                Route::post('/profile/{user_id}', [
                    'uses' => 'EditProfileController@update',
                    'as' => 'updatepro.api'
                    ]);

               Route::post('/score', [
                'uses' => 'ScoreController@create',
                'as' => 'score.api'
                ])->middleware('auth:api');
              


                Route::get('/score/{id}', [
                'uses' => 'ScoreController@show',
                'as' => 'scoreshow.api'
                ])->middleware('auth:api');
             
             
                Route::post('/score/{id}', [
                    'uses' => 'ScoreController@update',
                    'as' => 'scoreupdate.api'
                    ])->middleware('auth:api');

    
                    Route::post('/matchins', [
                    'uses' => 'MatchInController@store',
                    'as' => 'matchins.api'
                    ])->middleware('auth:api');
            
                    Route::get('/matchins/{id}', [
                        'uses' => 'MatchInController@show',
                        'as' => 'matchinsshow.api'
                        ])->middleware('auth:api');

                        Route::post('/matchins/{id}', [
                            'uses' => 'MatchInController@update',
                            'as' => 'matchinsupdate.api'
                            ])->middleware('auth:api');

             
            
                    Route::post('/tournamentins', [
                        'uses' => 'TournamentInController@store',
                        'as' => 'tournamentins.api'
                        ])->middleware('auth:api');


                        
                    Route::get('/tournamentins/{id}', [
                        'uses' => 'TournamentInController@show',
                        'as' => 'tournamentinsshow.api'
                        ])->middleware('auth:api');
                       
                          
                    Route::post('/tournamentins/{id}', [
                        'uses' => 'TournamentInController@update',
                        'as' => 'tournamentinsupdate.api'
                        ])->middleware('auth:api');




                        Route::post('/bowler', [
                            'uses' => 'BowlerController@store',
                            'as' => 'Bowler.api'
                            ])->middleware('auth:api');
    
                            Route::post('/team', [
                                'uses' => 'TeamController@store',
                                'as' => 'team.api'
                                ])->middleware('auth:api');
    
                                Route::post('/team/{id}', [
                                    'uses' => 'TeamController@edit',
                                    'as' => 'editteam.api'
                                    ])->middleware('auth:api');


                                    Route::post('/organize/match', [
                                        'uses' => 'OrganizeController@store',
                                        'as' => 'organize.api'
                                        ])->middleware('auth:api');



                                        Route::post('/organize/match/{id}', [
                                            'uses' => 'OrganizeController@edit',
                                            'as' => 'organizeedit.api'
                                            ])->middleware('auth:api');


                                            Route::get('/organize/match/{id}', [
                                                'uses' => 'OrganizeController@show',
                                                'as' => 'showorg.api'
                                                ])->middleware('auth:api');

                                        Route::get('/team/{id}', [
                                            'uses' => 'TeamController@show',
                                            'as' => 'teameditshow.api'
                                            ])->middleware('auth:api');


                                            Route::post('/organize/tournament', [
                                                'uses' => 'TournamentController@store',
                                                'as' => 'tour.api'
                                                ])->middleware('auth:api');


                                                Route::get('/organize/tournament/{id}', [
                                                    'uses' => 'TournamentController@show',
                                                    'as' => 'show.api'
                                                    ])->middleware('auth:api');


                                                Route::post('/organize/tournament/{id}', [
                                                    'uses' => 'TournamentController@update',
                                                    'as' => 'orgupdateshow.api'
                                                    ])->middleware('auth:api');

                                                    Route::get('/bowler/{id}', [
                                                        'uses' => 'BowlerController@show',
                                                        'as' => 'bowshow.api'
                                                        ])->middleware('auth:api');
                                        
                                                    Route::post('/bowler/{id}', [
                                                        'uses' => 'BowlerController@update',
                                                        'as' => 'bowupdateapi.api'
                                                        ])->middleware('auth:api');


                                                        Route::get('/profiles/{id}', [

                                                            "uses" => "HomeController@detail",
                                                            "as" => "profileget"
 
                                                        ]);

                                                    
                                                        Route::get('/teams', [

                                                            "uses" => "HomeController@data",
                                                            "as" => "gettour"
 
                                                        ]);

                                                        Route::get('/tournaments', [

                                                            "uses" => "HomeController@tour",
                                                            "as" => "gettour"
 
                                                        ]);

                                                           Route::get('/get/matches', [

                                                            "uses" => "HomeController@match",
                                                            "as" => "getmatch"
 
                                                        ]);

                                                        Route::get('/reward/{phone}', [

                                                            "uses" => "HomeController@reward",
                                                            "as" => "reward"
 
                                                        ]);


                                                        Route::get('/dashboard', [

                                                            "uses" => "HomeController@dashboard",
                                                            "as" => "dash"
 
                                                        ]);

                                                        Route::post('/scorecard', [
                                                                   'uses' => 'ScoresheetController@store',
                                                                   'as' => ''
                                                        ]);
                                                    Route::post('/scorecard/{id}', [
                                                            'uses' => 'ScoresheetController@finished',
                                                            'as' => 'score.end'
                                                 ]);  


                                                    

                                                 Route::get('/showusers', [

                                                    "uses" => "HomeController@showusers",
                                                    "as" => "showusers"

                                                ]);


                                                Route::post('/checknumberexists', [
                                                    
                                                    'uses' => 'HomeController@checknum'
                                                ]);

                                                

                                              



