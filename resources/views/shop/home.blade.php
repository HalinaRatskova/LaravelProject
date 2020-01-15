<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Quality Product</title>
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('src/css/app.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/99399915d6.js" crossorigin="anonymous"></script>


    </head>
    <body style="background-image:url('src/images/backgroundShoppingCart.jpg')">

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" >
      <img src="{{asset('src/images/LogoHorizontal.png')}}" /><a class="nav-link navbartext " href="{{route ('homepage')}}"></i>Home</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse"
         data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
 
 <!--Search in the navbar-->
  <form action="/searchresult" method="POST" role="search" >
    {{ csrf_field() }}
    <div class="input-group pull-right">
        <input type="text" class="form-control " name="q"
            placeholder="Search products"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>&nbsp;&nbsp;
@if($errors->any())
<h4 style="color:red;">{{$errors->first()}}</h4>

@endif
<br><br>
<!-- End Search in the navbar-->

 <div class="collapse navbar-collapse " id="navbarResponsive"> 
    <ul class="navbar-nav mr-auto pull-right"> 
      <li class="nav-item ">
      <a class="nav-link navbartext" href="{{ route('product.index') }}" >Shop</a>
</li>
      <li class="nav-item ">
        <a class="nav-link navbartext " href="{{route ('product.shoppingCart')}}"><i class="fas fa-shopping-cart navbartext "></i> 
        Shopping Cart <span style="color:red;"> {{ (Session::has('cart')) ? Session::get('cart') -> totalQty : ' ' }} </span>
        <span class="sr-only">(current)</span>
      </a>
      </li>
      @if(Auth::check())
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.profile')}}"><i class="fas fa-user-plus navbartext"></i>User Profile</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.logout')}}">Log Out</a>
      </li>
      @else
      <li class="nav-item ">
        <a class="nav-link navbartext " href="{{route('user.signup')}}"><i class="fas fa-user-plus navbartext"></i> Sign Up</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link navbartext" href="{{route('user.signin')}}">Log In</a>
      </li>
      @endif
        
      </li>
     
    </ul>

  </div>
</nav>


<marquee behavior="alternate" ><h1 class="userprofile" id="h1" >100% Natural and Organic Cosmetic Products for You</h1></marquee>
<div row>
 <div class="col-md-5 col-md-offset-4 profile"><br><br><br>

<a  href="{{ route('product.index') }}"  type="button" class="btn btn-primary btn-lg" >Go to Shopping</a>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>