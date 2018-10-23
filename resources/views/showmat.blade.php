@extends('layouts.app')


@section('content')
<table class="table table-striped table-bordered default-ordering">

  <thead>
      <tr>
        <th>Team owner/captain</th>
        <th>Team name</th>
        <th>country</th>
        <th>state </th>
        <th>city</th>
        <th>pin</th>
        <th>Established on</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($team as $teams)
            
      <tr>
        <td>{{ $teams->user->fname}}</td>
        <td>{{ $teams->teamname }}</td>
        <td>{{ $teams->country }}</td>
        <td>{{ $teams->state }}</td>
        <td>{{ $teams->city }}</td>
        <td>{{ $teams->pin }}</td>
        <td>{{ $teams->created_at->format('d,M,Y') }}</td>


      </tr>
      @endforeach

    </tbody>
</table>


    @stop