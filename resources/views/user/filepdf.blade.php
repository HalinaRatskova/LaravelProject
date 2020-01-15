<div class="row" >
<div class="col-md-4 col-md-offset-4">
    <h1 class="userprofile">Order</h1>
    
</div>
</div>



@if(count($invoices)>0)

@php ($order_id = false)
<!--@php ($total_value = 0)-->
@foreach($invoices as $value) 
    @if($order_id != $value['order_id'])
        @if($order_id != false)
            </tbody>
            <tfoot>
            <tr>
            
            
            </tr>
            </tfoot>
            </table> 
        @endif
        @php ($order_id = $value['order_id'])
        <table class="" style="width: 100%;border:1px solid #ccc">
            <thead>
                <tr>
                    <th colspan="2"> <p> Order ID: {{ $value->order_id }} </p></th>
                    <th colspan="2"> <p> Total price: $ {{ $value->total_price }} </p></th>
                </tr>
                <tr>
             
                <th>Address</th>
             
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Title</th>
                <!--<th>Description</th>-->
                 <th>Price</th>
                 <th>Image</th>
               
                </tr>
            </thead>
            <tbody>
    @endif
        <tr>
        <td>{{ $value['address'] }}</td>
        
            <td>{{ $value['product_id'] }} </td>
            <td>{{ $value['quantity'] }}</td>
            <td>{{ $value['title'] }}</td>
            <!--<td>{{ $value['description'] }}</td>-->
            <td>{{ $value['price'] }}</td>
            <td><img class="img-responsive" src="./images/{{$value->imagePath}}" height="80" width="90" alt=""/></td>
            

            
        </tr>
   

</tbody>
<tfoot>

</tfoot>
@endforeach
</table> 



@else
 
    <h2>Order Details</h2>
    <p>You do not have any orders</p>
@endif


   
    
