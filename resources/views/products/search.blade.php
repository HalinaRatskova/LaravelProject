@extends('layout.master1')
@section('title')
Admin view
@endsection
@section('content')
<!DOCTYPE html>
<html>
<head>
<title> Products</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Product details</h2>
    <table class="table table-hover text-center">
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
                <td>{{$user->title}}</td>
                <td>{{$user->description}}</td>
                <td>{{$user->price}}</td>
                <td><img class="img-responsive" src={{$user->imagePath}} width="90" height="90" alt=""/></td>
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