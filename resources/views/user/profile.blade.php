@extends('layout.master')
@section('content')
<div class="row" >
<div class="col-md-5 col-md-offset-4 profile">
    <h1 class="userprofile">User Profile</h1>
    @if($message = Session::get('info'))
        <div class="alert alert-info">
            <p style="font-size: 14px; font-weight:bold; color: blue;">{{$message}}</p>
        </div>
        @endif
{{ csrf_field() }}
<div >
<a href="{{url('/user/edit')}}" class="btn btn-outline-light user-profile">Edit Profile</a></br>
                <a href="{{url('/user/orders')}}" class="btn btn-outline-light user-profile">Orders Details</a></br>
                <a href="{{route('product.index')}}" class="btn btn-outline-light user-profile ">Go to Shop</a>
   </div>  
</div>
</div>

@if(count($invoices)>0)


<!--@foreach($invoices as $user)
@endforeach
               <h1 class="stylish-heading">Welcome: {{ $user->firstName }} {{ $user->lastName }}</h1>-->
                
            
@endif
@endsection
   
    
