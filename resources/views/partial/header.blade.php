<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        
        <title>Quality Products</title>
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('src/css/app.css') }}">
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-expand-md navbar-light "  id="navbar" style="background:transparent;" >
      <img src="{{asset('src/images/LogoHorizontal.png')}}" /><a class="navbar-brand" id="brand" href="{{route ('homepage')}}"></i>Home</a>
     <button class="navbar-toggler " type="button"  data-toggle="collapse"
         data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
 


 <!--Search in the navbar-->
  <form action="/searchresult" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search products"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>&nbsp;&nbsp;
@if($errors->any())
<div class="alert alert-danger">

   @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    </div>

<!--<h4 style="color:red;">{{$errors->first()}}</h4>-->
@endif
<br><br>
<!--Search in the navbar-->

 <div class="collapse navbar-collapse navbartext" id="navbarResponsive"> 
    <ul class="navbar-nav mr-auto pull-right"> 
      
      <li class="nav-item navbartext">
      <a  class="nav-link navbartext"  href="{{ route('product.index') }}" >Shop</a>
        
      </li>

      <li>
        <a class="nav-link navbartext" href="{{route ('product.shoppingCart')}}"><i class="fas fa-shopping-cart navbartext"></i> 
        Shopping Cart <span style="color:red;"> {{ (Session::has('cart')) ? Session::get('cart') -> totalQty : ' ' }} </span>
        <span class="sr-only">(current)</span>
      </a>
      </li>
      @if(Auth::check())
      <li class="nav-item navbartext">
        <a class="nav-link navbartext" href="{{route('user.profile')}}"><i class="fas fa-user-plus navbartext"></i>User Profile</a>
      </li>
      <li class="nav-item navbartext">
        <a class="nav-link navbartext" href="{{route('user.logout')}}">Log Out</a>
      </li>
      @else
      <li class="nav-item navbartext">
        <a class="nav-link navbartext " href="{{route('user.signup')}}"><i class="fas fa-user-plus navbartext"></i> Sign Up</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.signin')}}">Log In</a>
      </li>



      @endif
        
      

    </ul>
  </div>
</nav>


</body>
</html>