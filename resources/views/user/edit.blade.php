@extends ('layout.master')

@section('content')

<div class="row" >
<div class="col-sm-7 col-md-offset-3 col-sm-offset-3">
        <br/>
        <h1 align="center" class="userprofile">Edit Profile</h1>
        <br/>
        <a href="{{ URL::previous() }}" type="button" class="btn btn-info pull-right">Go Back</a><br><br>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{action('UserController@update')}}">
    {{ csrf_field() }}
    {{ method_field('patch') }}

    <div class="form-group">
    <input type="text" name="firstName" class="form-control" placeholder="Enter First Name" value="{{$user->firstName}}"/>
    </div>
    <div class="form-group">
    <input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" value="{{$user->lastName}}"/>
    </div>
    <div class="form-group">
        <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter Email"/>
    </div>

    <input type="password" name="password" placeholder="Enter password"/>

    <input type="password" name="password_confirmation"  placeholder="Confirm password" />

    <button type="submit" class="pull-right btn btn-info">Save</button>
  
</form>
       
 </div>

</div>

@endsection