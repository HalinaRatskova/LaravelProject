@extends('layout.master1')
@section('title')
Admin view
@endsection

@section('content')

<div class = row>
    <div class="col-md-12">
        <br/>
        <h1 align="center" class="userprofile">Found Product Data</h1>
        <br/>
        <a href="{{ URL::previous() }}" type="button" class="btn btn-info pull-right">Go Back</a><br><br><br>
        @if(isset($product))
        <table class="table table-hover">
            <tr>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Image</th>

                
            </tr>
            @foreach($product as $row)
            <tr>
                <td>{{$row['title']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{$row['price']}}</td>
                <td><img class="img-responsive" src="{{url('/images/'.$row->imagePath)}}" height="80" width="80" alt=""/></td>
               
            </tr>
            @endforeach
        </table>
        @endif
 </div>
  
</div>

@endsection