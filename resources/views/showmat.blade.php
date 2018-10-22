@extends('layouts.app')


@section('content')


<div class="row">
    <div class="col-lg-3 col-xl-3 col-md-3">

    </div>
    <div class="col-lg-6 col-xl-6 col-md-6 mt-5">

              <table class="table table-striped table-bordered zero-configuration">
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
    </div>
</div>
  </section>
                







