<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Quality Product</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('src/css/app.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" >
      <img src="{{asset('src/images/LogoHorizontal.png')}}"/>
     <button class="navbar-toggler" type="button" data-toggle="collapse"
         data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
 
 <!--Search in the navbar-->
  
@if($errors->any())
<!--<h4 style="color:red;">{{$errors->first()}}</h4>-->
@endif
<br><br>
<!--Search in the navbar-->

 <div class="collapse navbar-collapse " id="navbarResponsive"> 
    <ul class="navbar-nav mr-auto pull-right"> 
      
      @if(Auth::check())
     
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.logout')}}">Log Out</a>
      </li>
      @else
     
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.signin')}}">Log In</a>
      </li>
      @endif
        
      
     
    </ul>

  </div>
</nav>
</body>
</html>