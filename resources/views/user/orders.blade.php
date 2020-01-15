@extends('layout.master')
@section('title')
Orders Details
@endsection
@section('content')
<div class="row" >
<div class="col-sm-7 col-md-offset-3 col-sm-offset-3">
    <h1 align="center" class="userprofile">Orders History</h1>
  
    <a  href="{{ action('UserController@export_pdf') }}" type="button" class="btn btn-info">Export PDF</a>
    <a href="{{ URL::previous() }}" type="button" class="pull-right btn btn-info">Go Back</a></br></br>
{{ csrf_field() }}



@if(count($invoices)>0)

@php ($order_id = false)
<!--@php ($total_value = 0)-->
@foreach($invoices as $value) 
    @if($order_id != $value['order_id'])
        @if($order_id != false)
          
        @endif
        @php ($order_id = $value['order_id'])
       
        <table class="table  table-hover text-center" >
            <thead>
                <tr >
                     <th><h4><span  class="label label-info">Order ID: {{ $value->order_id }} </span></h4></th>
                     <th><h4><span class="label label-info"> Total price: $ {{ $value->total_price }} </span></h4></th>
                </tr>
                <tr >
                <th>Address</th>
                <th>Quantity</th>
                <th>Title</th>
                 <th>Price,$</th>
                 <th>Image</th>
               
                </tr>
            </thead>
            <tbody>
    @endif
        <tr >
        <td >{{ $value['address'] }}</td>
            <td>{{ $value['quantity'] }}</td>
            <td>{{ $value['title'] }}</td>
            <td>{{ $value['price'] }}</td>
            <td><div class="img-hover-zoom--quick-zoom img">
                <img class="img-responsive" src="{{url('/images/'.$value->imagePath)}}" height="80" width="80" alt=""/></td>
                </div>
        </tr>
</tbody>
<tfoot>
</tfoot>
@endforeach
</table> 
<a href="{{ URL::previous() }}" type="button" class="pull-right btn btn-info">Go Back</a></br>
</div>
</div>

@else
 
    <h2 class="userprofile ">Order Details</h2>
    <h4>You don't have any orders</h4>
    
@endif

@endsection
   