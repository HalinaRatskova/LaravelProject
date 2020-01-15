<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use App\Cart;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        return $request;
    }
    public function getAddToCart(Request $request, $id){
        $product= Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        
        return redirect()->route('product.index');
    }
    protected function addToOrdersTables($request)
    {
        $oldCart = Session::get('cart'); 
        $cart = new Cart($oldCart);       
        
        // Insert into orders table
      
        $order = new Order;
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->cart = $request->input('cart');
        $order->user_id = auth()->user()->id;
        $order->save();
    
       
        
       // Insert into order_product table
      
    $orderProducts = [];
    foreach ($cart->items as $productId => $item) {
        $orderProducts[] = [
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $item['qty']
        ];
    }
    DB::table('order_product')->insert($orderProducts);
 //return $order;
    

}
}
    
    

        
       
    
   

