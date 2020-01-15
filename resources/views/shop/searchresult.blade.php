@extends('layout.master1')

@section('content')
<!DOCTYPE html>
<html>
<head>
<title> Users Registered</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @if(isset($details))
        <p class="userprofile"> The Search Results:<b> {{ $query }} </b></p>

        <a  href="{{ URL::previous() }}" type="button" class="pull-right btn btn-info">Go Back</a></br>
    <h1 class="userprofile">Product Details</h1>
    <table class="table table-hover bg-white">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td class="title">{{$user->title}}</td>
                <td>{{$user->description}}</td>
                <td>{{$user->price}}</td>
                <td><img class="img-responsive" src="{{url('/images/'.$user->imagePath)}}" height="80" width="80" alt=""/></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $details->onEachSide(1)->links() }}
    @endif
</div>
</body>
</html>
@endsection