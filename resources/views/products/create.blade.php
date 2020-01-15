@extends ('layout.master1')
@section('title')
Admin view
@endsection
@section('content')
<div class = row>
    <div class="col-md-12">
        <br/>
        <h1 align="center" class="userprofile">Add Product Data</h1>
        <br/>
        <a href="{{ URL::previous() }}" type="button" class="btn btn-info pull-right">Go Back</a><br><br>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif
        <form method="POST" action="{{url('products')}}" enctype="multipart/form-data">  
            {{csrf_field()}}
    <div class="form-group">
    <input type="text" name="title" class="form-control" placeholder="Enter Product Name"/>
    </div>
        <div class="form-group">
        <textarea name="description" class="form-control" rows="5" cols="40"  placeholder="Enter Product Description"></textarea>
    </div>
    <div class="form-group">
        <input type="text" name="price" class="form-control" placeholder="Enter Product Price"/>
    </div>
    <div>
        <input type="file" name="imagePath"/>
    </div>
        <div class="form-group">
         
        <input type="submit" name="submit" value="Submit" class="btn btn-info pull-right"/> 
    </div> 
</form>
    </div>

</div>
@endsection