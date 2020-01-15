@extends('layout.master')
@section('title')
Shopping Cart
@endsection
@section('content')
@if(Session::has('cart'))
<div class="row">

<div class="col-sm-7 col-md-offset-3 col-sm-offset-3">
    <ul class="list-group">
        
          @foreach($products as $product)
            <li class="list-group-item">
                <span class="label label-info  ">Q-ty: {{$product['qty']}}</span>
                <span class="label label-info ">Price $: {{ $product['price'] }}</span></br>
               
                <div class="img-hover-zoom--quick-zoom img">
                <img class="zoomImage" src="{{url('/images/'.$product['item']['imagePath'])}}"  height="80" alt="Another Image zoom-on-hover effect">
             <strong>{{$product['item']['title']}}</strong> </div>

                <a href="{{route('product.remove', ['id'=>$product['item']['id']]) }}"
                 type="button" class="btn  btn-secondary btn-xs pull-right" id="delete" role="button">Delete All</a>
                <a href="{{route('product.reduceByOne', ['id'=>$product['item']['id']]) }}"
                 type="button" class="btn  btn-secondary btn-xs pull-right" role="button">Reduce by one</a>
                 <a  href="{{route('product.increaseByOne', ['id'=>$product['item']['id']]) }}"
                 type="button" class="btn  btn-secondary btn-xs pull-right" id="addone" role="button">Add one</a><hr>
            </li> 
         @endforeach

    </ul>
</div>
</div>


<div class="row">
<div class="col-sm-7 col-md-offset-3 col-sm-offset-3" >
    <h3><span class="label label-default"><strong>Total price $: {{$totalPrice}}</strong></span></h3>
</div>
<div class="col-sm-7 col-md-offset-3 col-sm-offset-3">
    <a href="{{ route('checkout')}}" type="button" class="btn btn-info pull-right">Checkout</a>
</div>

</div>


@else
<div class="row">
<div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
   <h1 style="text-align:center;" class="userprofile">Cart is empty!</h1>
</div>
</div>
@endif
@endsection
