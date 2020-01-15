@extends ('layout.master1')

@section('content')

<div class = row>
    <div class="col-md-12">
        
        <h1 align="center" class="userprofile">Found User Data</h1>
        </br>
        <a href="{{ URL::previous() }}" type="button" class="pull-right btn btn-info">Go Back</a> <br/><br/> <br/>  
        @if(isset($user))
        <table class="table table-hover text-center">
            <tr>
                <th>User ID</th>
                <th>User First Name</th>
                <th>User Last Name</th>
                <th>User Email</th>
                
            </tr>
            @foreach($user as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['firstName']}}</td>
                <td>{{$row['lastName']}}</td>
                <td>{{$row['email']}}</td>
               
            </tr>
            @endforeach
        </table>
        @endif
 </div>

</div>

@endsection