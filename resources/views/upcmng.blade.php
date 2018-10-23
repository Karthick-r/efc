@extends('layouts.app')


@section('content')


    <table class="table table-striped table-bordered default-ordering">
                    <thead>
                      <tr>
                        <th>Team name</th>
                        <th>Versus</th>
                        <th>Match Date</th>
                        <th>Overs</th>

                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($upcmng as $up)
                            
                      <tr>
                        <td>{{ $up->whovswho}}</td>
                        <td>{{ $up->oppo }}</td>
                        <td>{{ $up->matchdate }}</td>

                        <td>{{ $up->overs }}</td>

@endforeach
                    </tbody>
                   
                  </table>


      @stop
