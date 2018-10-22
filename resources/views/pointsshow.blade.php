@extends('layouts.app')

@section('content')

<form action="{{ route('homepoints') }}" method="POST">
{{csrf_field()}}


    <h3> Increse or decrease Scoresheet points </h3> <br/>
    
<div class="input-group input-group-sm mb-3">
<input type="text" class="form-control" aria-label="Small" name="points"  value = {{ $change->points }} aria-describedby="inputGroup-sizing-sm">
<br/>



</div>

<h3> Increse or decrease Reward points </h3> <br/>
    
<div class="input-group input-group-sm mb-3">
<input type="text" class="form-control" aria-label="Small" name="rewards" value="{{ $change->rewards }}"  aria-describedby="inputGroup-sizing-sm">




</div>

<input type="submit" class="btn btn-primary " style="border-radius:50px; width:10vw">


    
</form>










@endsection
