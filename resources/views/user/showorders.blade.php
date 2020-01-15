@extends('layout.master')
@section('content')
<div class="row" >
<div class="col-md-4 col-md-offset-4">
    <h1>User:</h1>
</div>
</div>
{{ csrf_field() }}



@if(count($invoices)>0)

   
<div class="products-header">
<!--@foreach($invoices as $user)
@endforeach-->
                
            </div>
            <h2>Order Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Address</th>
                <th>Name</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $user)
            @endforeach
            <tr>
                <td>{{$user->order_id}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->product_id}}</td>
                <td>{{$user->quantity}}</td>
                <td>{{$user->title}}</td>
                <td>{{$user->description}}</td>
                <td><img class="img-responsive" src={{$user->imagePath}}  height="90" width="90" alt=""/></td>
                <td>$ {{$user->price*$user->quantity}}</td>
                
            </tr>
            
        </tbody>
        
        <!--close foreach-->

       
      
       
        

        <tfoot>
    <tr>
   
    
<!--<th colspan="3">Total for Order {{$user->order_id}}: </th>
    
   <td>{{$user->total_price}}</td>-->
      
  
    </tr>

   </tfoot>
 
   <h4 colspan="3">Total for Order {{$user->order_id}}:  
   {{$user->total_price}}</h4>
    
   
  
    </table>
    
@else
 
    <h2>Order Details</h2>
    <p>You do not have any orders</p>
@endif
<a href="{{ URL::previous() }}">Go Back</a> 
@endsection
   
    
