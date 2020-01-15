@extends('layout.master')
@section('title')
View Products
@endsection
@section('content')
@if(Session::has('success'))



<div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}

      </div>
  </div>
</div>
@endif

@if (isset($products)) 
@foreach($products->chunk(4)  as $productChunk)

<div class="row product">
    @foreach($productChunk as $product)
    <div class="col-sm-7 col-md-3">

    <div class="column">
    <div class="card">
      <div class="thumbnail">
      <p><span class="label label-info">Price: ${{$product->price}} </span></p>
      
      <img src="{{url('/images/'.$product->imagePath)}}" alt=""
       class="image-responsive">
        
        <h4 id="producttitle">{{$product->title}}</h4>
        <p class="description">{{$product->description}}</p>
        </div>
        </div>
            <div class="clearfix">

            
      <div class="card shopimage"><a href="{{ route('product.addToCart', ['id'=> $product->id]) }}" class=" btn btn-info pull-right" role="button">Add To Cart</a></div>
      
            
      

          </div>
      
    </div>
  </div>

  

    @endforeach


</div>


@endforeach
@endif
{{ $products->links() }}
@endsection