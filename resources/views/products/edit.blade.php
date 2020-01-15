@extends ('user.admin')
@section('title')
Admin view
@endsection
@section('content')



<div class = row>
    <div class="col-md-12">
        <br/>
        <h1 align="center" class="userprofile">Edit Product Data</h1>

        <br/>
        <a href="{{ URL::previous() }}" type="button" class="btn btn-info pull-right">Go Back</a> <br>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{action('ProductController@update',$id)}}" enctype="multipart/form-data">  
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
    <div class="form-group">
    <label>Product Name:</label> <input type="text" name="title" class="form-control" placeholder="Enter Product Name" value="{{$product->title}}"/>
    </div>
        <div class="form-group">
        <label>Product Description:</label><textarea name="description" class="form-control" rows="5" cols="40" placeholder="Enter Product Description">
        
        {{$product->description}}
        </textarea>
    </div>
    <div class="form-group">
       <label>Price, $:</label> <input type="text" name="price"  class="form-control" value="{{$product->price}}" placeholder="Enter Product Price"/>
    </div>
    <div class="form-group">
    <img src="{{url('/images/'.$product->imagePath)}}" height="80" width="80"/><br><br>
      <input type="file" name="imagePath"  class="#" value="{{$product->imagePath}}"/>
    </div>
        <div class="form-group">
        <input type="submit" name="submit" value="Edit" class="btn btn-info pull-right"/> 
       
  


    </div> 
</form>
 </div>

</div>

@endsection