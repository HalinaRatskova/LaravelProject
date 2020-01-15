@extends('layout.master1')
@section('content')

<div class="row" >
<div class="col-md-5 col-md-offset-4">

@if (!empty($success))
    <span><h1 style="color:red; font-soize:20px; text-align:center">{{ $success }}</h1><span><br><br>
@endif

&nbsp;<a target=_blank href="/adminuser" class="btn btn-info" style="width:125px; text-align:center;" >Manage Users</a>

   
</div>
</div>
@endsection