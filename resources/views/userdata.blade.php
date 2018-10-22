@extends('layouts.app')


@section('content')

<section id="ordering">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Users Data</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <p class="card-text">List of users</p>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @stop
