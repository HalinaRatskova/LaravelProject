@extends ('layout.master1')
@section('title')
Admin view
@endsection
@section('content')
<div class = row>
    <div class="col-md-12">
        
        <h1 align="center" class="userprofile">Products Data</h1>
        </br>
        @if($message = Session::get('alert'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>

        @endif
        <div>@if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <form method="GET" action="{{action('ProductController@show','search')}}" role="search">  
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="Search products"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

        </div>
        <br/>
        <br/>
        </div>
 
</div>
        <div >
        <a href="{{route('products.create')}}" class="btn btn-info pull-right">Add Product</a>
        <a href="/adminuser" class="btn btn-info pull-left" style="width:125px;" >Manage Users</a>
        <br/>
        <br/>
        </div>
        <table class="table table-hover text-center" style="background:white;">
            <tr>
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $row)
            <tr>
                <td class="title">{{$row['title']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{$row['price']}}</td>
                <td><img src="{{url('/images/'.$row->imagePath)}}" height="80" width="80" class="image-responsive "></td>
                <td><a href="{{action('ProductController@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                <form onsubmit="return confirm('Do you really want to delete?');" method="POST" action="{{action('ProductController@destroy',$row['id'])}}" class="delete_form">  
                {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit" name="submit"  class="btn btn-danger">Delete</button> 
                </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$products->links()}}
    </div>

</div>    
    <script>
            $(document).ready (function(){
                $('.delete_form').on('submit',function(){
                    if(confirm("Are you sure you want to delete this product?"))
                    {
                        return true;
                    }
                    else 
                    {
                        return false;
                    }
                });
            });
    </script>
@endsection