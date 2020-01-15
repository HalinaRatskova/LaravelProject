@extends('layout.master1')

@section('content')
<!DOCTYPE html>

<html>
    <head>
        <title>Admin View</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('src/css/app.css')}}"/>
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"/>
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body>
 
</br></br>
        <div class="row" >
            <div class="col-md-7 col-md-offset-3 ">
                <div class="jumbotron" style="background-color:white;">
                <p class="userprofile">You Login as Administrator.</p>
                
                <h5>To manage product's or user's data (delete/update/add), click on the button. </h5></br>
                <a href="/products" class="btn btn-info" style=" width:125px;">Manage Products</a> &nbsp; 
                 &nbsp;<a href="/adminuser" class="btn btn-info" style="width:125px;" >Manage Users</a>

                 </div>
            </div>      
        
        </div>
       
    
    </body>
</html>
@endsection
   