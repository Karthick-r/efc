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
            'uses' => 'ProfileController@create',
            'as' => 'profile.api'
            ]);
    
    
        Route::post('/score', [
                'uses' => 'ScoreController@create',
                'as' => 'score.api'
                ])->middleware('auth:api');
    
                Route::post('/matchins', [
                    'uses' => 'MatchInController@store',
                    'as' => 'matchins.api'
                    ])->middleware('auth:api');
            Route::post('/tournamentins', [
                        'uses' => 'TournamentInController@store',
                        'as' => 'tournamentins.api'
                        ])->middleware('auth:api');
                        Route::post('/bowler', [
                            'uses' => 'Bowler@store',
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


                                        