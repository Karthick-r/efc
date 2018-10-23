@extends('layouts.app')


@section('content')

                  <table class="table table-striped table-bordered default-ordering">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Batsman</th>
                        <th>Bowler</th>
                        <th>See Profile</th>

                        <th>block</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                            
                      <tr>
                        <td>{{ $users->fname}}</td>
                        <td>{{ $users->profile->batsman }}</td>
                        <td>{{ $users->profile->bowler }}</td>
                        <td><a href="{{ route('viw', ['id' => $users->id]) }}" class="btn btn-danger"> view</a> </td>

                        @if($users->role_id == 1)
                        <td>  <a href="{{ route('block', ['id' => $users->id]) }}" class="btn btn-danger"> Block</a> </td>
                        @else
                 <td>Blocked</td>
                        @endif
                      </tr>
                      @endforeach

                    </tbody>
                   
                  </table>
      

      @stop
