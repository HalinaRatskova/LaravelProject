@extends('layout.master')
@section('title')
Shopping Cart
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
    <h1 class="userprofile">Checkout <span class="label label-default  pull-right">Total: ${{$total}}</span></h1>
    
    <form action="{{ route('checkout') }}" method="post" id="checkout-form">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" maxlength="32" pattern="[A-Za-z ]{1,32}" title="Name should only contain  letters. e.g. John" class="form-control", required>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control", required name="address"> 
                </div>
            </div>  
        <hr>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="card-name">Card Holder Name</label>
                <input type="text" id="card-name" maxlength="32" pattern="[A-Za-z ]{1,32}" title="Name should only contain  letters. e.g. John" class="form-control", required> 
            </div>
        </div>
        <div class="col-xs-12">
        <div class="form-group">
                <label for="card_number">Credit Card Number</label>
                <input type="number" id="card_number" name="card_number" class="form-control"  pattern=“^[0–9]$”
                title="Enter only numeric values." required> 
            </div>   
        </div>
        

        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
        <div class="form-group" id="expiration-date" required >
                <label id="expdate">Expiration Date</label>
                <select id="month">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select>
                    <option value="16"> 2020</option>
                    <option value="17"> 2021</option>
                    <option value="18"> 2022</option>
                    <option value="19"> 2023</option>
                    <option value="20"> 2024</option>
                    <option value="21"> 2025</option>
                </select>
            </div>
        </div>
    </div>
</div>



        <div class="col-xs-12">
            <div class="form-group">
                <label for="card-cvc">CVC</label>
                <input type="number" id="card-cvc" class="form-control" pattern="([0-9]|[0-9]|[0-9])" maxlength="3" title="CVC must contain 3 numbers." required>
            </div>
        </div>
        </div>
{{ csrf_field() }}
<button type="submit" class="btn btn-info pull-right">Buy now</button>
<button onclick="goBack()" class="btn btn-info pull-left ">Back</button>
    </form>

</div>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>
@endsection
