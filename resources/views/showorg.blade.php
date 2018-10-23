@extends('layouts.app')



@section('content')


                  <table class="table table-striped table-bordered default-ordering">
                    <thead>
                        <tr>
                          <th>Match Organizer</th>
                          <th>Match date</th>
                          <th>country</th>
                          <th>state </th>
                          <th>Team name</th>
                          <th>versus</th>
                          <th>overs</th>
                          <th>Created on</th>

                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($org as $orgs)
                              
                        <tr>
                          <td>{{ $orgs->user->fname}}</td>
                          <td>{{ $orgs->matchdate }}</td>
                          <td>{{ $orgs->country }}</td>
                          <td>{{ $orgs->state }}</td>
                          <td>{{ $orgs->whovswho }}</td>
                          <td>{{ $orgs->oppo }}</td>

                          <td>{{ $orgs->overs }}</td>
                       
                          <td>{{ $orgs->created_at->format('d,M,Y') }}</td>
    
    
                        </tr>
                        @endforeach
    
                      </tbody>
                  </table>
       
     

@endsection