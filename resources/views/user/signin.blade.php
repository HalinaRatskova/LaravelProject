@extends('layout.master')
@section('content')
<div class="row" >
<div class="col-md-5 col-md-offset-4">
    <h1 align="center" class="userprofile">Sign In</h1>
    @if(count($errors)>0)
    <!--<div class="alert alert-danger">

   @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    </div>-->

    
    @endif

   
    <form action="{{route('user.signin')}}" method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
</div>
<div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-info pull-right">Sign In</button>
{{csrf_field() }}

</form>
<h4>Don't have an account? Click <a href="{{ route('user.signup') }}"><strong> Sign Up.<strong></h4></p>
</div>
</div>
@endsection