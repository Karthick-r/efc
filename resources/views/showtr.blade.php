@extends('layouts.app')



@section('content')<div class="card">

                  <table class="table table-striped table-bordered default-ordering">
                    <thead>
                        <tr>
                          <th>Tournament Organizer</th>
                          <th>Tournament type</th>
                          <th>No of teams</th>
                          <th>overs </th>
                          <th>Established date</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($tour as $tours)
                              
                        <tr>
                          <td>{{ $tours->user->fname}}</td>
                          <td>{{ $tours->tourtype }}</td>
                          <td>{{ $tours->noofteams }}</td>
                          <td>{{ $tours->overs }}</td>
                       
                          <td>{{ $tours->created_at->format('d,M,Y') }}</td>
    
    
                        </tr>
                        @endforeach
    
                      </tbody>
                  </table>
    

@endsection