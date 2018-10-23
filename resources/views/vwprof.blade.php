@extends('layouts.app')


@section('content')

          <table class="table table-striped table-bordered default-ordering">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Batsman</th>
                        <th>Bowler</th>
                        <th>About</th>
                        <th>Wicket Keeper</th>
                        <th>All Rounder</th>
                        <th>Joined Date</th>

                      </tr>
                    </thead>
                    <tbody>
                            
                      <tr>
                        <td>{{ $prof->user->fname}}</td>
                        <td>{{ $prof->batsman }}</td>
                        <td>{{ $prof->bowler }}</td>
                        <td>{{ $prof->about }}</td>
                        <td>
                                @if($prof->wicketkeeper)

                            
                            Yes
                        @else
                        No 
                        @endif
                        </td>

                       

                        <td>
                                @if($prof->allrounder)

                            
                            Yes
                        @else
                        No 
                        @endif
                        </td>

                        <td>{{ $prof->created_at->format('d,M, Y') }}</td>


                    </tbody>
                   
                  </table>
    


      @stop
