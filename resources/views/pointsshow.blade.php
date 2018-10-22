@extends('layouts.app')

@section('content')

<form action="{{ route('homepoints') }}" method="POST">
<div class="input-group input-group-sm mb-3">
       
        <input type="text" class="form-control" aria-label="Small" name="points" value="{{ $change->points }}" aria-describedby="inputGroup-sizing-sm">
      </div>
    

      <input type="submit" class="btn btn-primary mt-3">
</form>
@endsection