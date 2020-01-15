@extends ('layout.master1')

@section('content')
<div class = row>
    <div class="col-md-12">
        
        <h1 align="center" class="userprofile">Users Data</h1>
          </br>
        <a href="/products" class="btn btn-info" style=" width:125px;">Manage Products</a> &nbsp; 
        <br><br>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div>
            <form method="GET" action="{{action('AdminController@show','search')}}" role="search">  
            {{csrf_field()}}
                <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder ="Search user">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                </div>
            </form>
        </div>
        <br/>
        <br/>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        
        <table class="table table-hover text-center ">
            <tr>
                <th>User ID</th>
                <th>User First Name</th>
                <th>User Last Name</th>
                <th>User Email</th>
                
              
                <th>Delete</th>
            </tr>
            @foreach($users as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['firstName']}}</td>
                <td>{{$row['lastName']}}</td>
                <td>{{$row['email']}}</td>
                
               
                <td>
                <form method="POST" action="{{action('AdminController@destroy',$row['id'])}}" class="delete_form">  
                {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit" name="submit"  class="btn btn-danger">Delete</button> 
                </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$users->links()}}
    </div>

</div>    
    <script>
            $(document).ready (function(){
                $('.delete_form').on('submit',function(){
                    if(confirm("Are you sure you want to delete this User?"))
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