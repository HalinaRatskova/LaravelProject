@extends('layout.master')
@section('content')
<div class="row" >
<div class="col-md-5 col-md-offset-4 ">
    <h1 align="center" class="userprofile">Sign Up</h1>
    <!--@if(count($errors)>0)
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    </div>
    @endif-->
    
    <form action="{{route('user.signup')}}" method="post">
    <div class="form-group">
    <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" class="form-control">
    </div>
    <div class="form-group">
    <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
</div>
<div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-info pull-right">Sign Up</button>
{{csrf_field() }}

</form>

</div>
</div>
@endsection