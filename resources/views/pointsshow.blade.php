@extends('layouts.app')

@section('content')

<form action="{{ route('homepoints') }}" method="POST">
{{csrf_field()}}


    <h3> Increse Scoresheet points </h3> <br/>
    
<div class="input-group input-group-sm mb-3">
<input type="text" class="form-control" aria-label="Small" name="points"  value = {{ $change->points }} aria-describedby="inputGroup-sizing-sm">
<br/>

      <input type="submit" class="btn btn-primary ">


</div>



    
</form>


<form action="" method="POST">
{{csrf_field()}}


    <h3> Increse Reward points </h3> <br/>
    
<div class="input-group input-group-sm mb-3">
<input type="text" class="form-control" aria-label="Small" name="points"  aria-describedby="inputGroup-sizing-sm">
<br/>

      <input type="submit" class="btn btn-primary ">


</div>



    
</form>



@endsection
