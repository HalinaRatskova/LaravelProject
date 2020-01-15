<?php

namespace App\Http\Controllers;
use Session;
use App\Cart;
use App\Product;
use App\Order;
use App\OrderProduct;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers;
use DB;

class ProductController extends Controller
{


    
//Show products

    public function getIndex(){
        $products=DB::table('products')->paginate (8)->setPath ( '' );
    return view ('shop.index',['products'=>$products]);
    }
// Add products to shopping cart
    public function getAddToCart(Request $request, $id){
        $product= Product::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
        
           
   

}  

//reduce product quantity 
    public function getReduceByOne($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) >0){
            Session::put('cart', $cart); 
         }else{
             Session::forget('cart');
         }
        return redirect()->route('product.shoppingCart');

    }
//delete product from shopping cart
    public function getRemoveItem($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) >0){
           Session::put('cart', $cart); 
        }else{
            Session::forget('cart');
        }
        
        return redirect()->route('product.shoppingCart');


    }
// show shopping cart
    public function  getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart =Session::get('cart');
        $cart=new Cart($oldCart);
        return view('shop.shopping-cart', ['products'=>$cart->items, 
        'totalPrice'=>$cart->totalPrice]);
    }
//show checkout page
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('shop.checkout', ['total'=>$total]);
        
    }
    //complete checkout
    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('shop.shoppingCart');
            $oldCart=Session::get('cart');
            $cart = new Cart($oldCart);
        }
      
        $oldCart = Session::get('cart'); 
        $cart = new Cart($oldCart);       
        
        // Insert into orders table
      
        $order = new Order;
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->cart = $request->input('card_number');
        $order->user_id = auth()->user()->id;
        $order->total_price =$cart-> totalPrice;
        $order->save();
    
       
        
       // Insert into order_product table
      
    $orderProducts = [];
    foreach ($cart->items as $productId => $item) {
        $orderProducts[] = [
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $item['qty'],
            'price'=>$item['price'],
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
           
           
        ];
    }
    DB::table('order_product')->insert($orderProducts);
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products');

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code for retrieve data from database
      
      
        $products= Product::orderBy('id', 'DESC')->paginate(3);
        return view('products.index',compact('products'))
                    ->with('i',(request()->input('page',1)-1)*10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display and search the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request,[
            'search' =>'required',
           

        ]);
        $q = $request->get('search');
        
        if ($q !=""){
            $product = Product::where('title','LIKE','%'.$q.'%')
                                       ->orWhere('description','LIKE','%'.$q.'%') 
                                       ->orWhere('price','LIKE','%'.$q.'%')
                                       ->get();
                                       if(isset($product)&& count($product) > 0){
                                           return  view('products.show',compact('product'));
                                       }
                                       return  redirect()->route('products.index')->with('alert','Sorry No Product Found');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        //$product->save();
        return view('products.edit',compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             
        if($request->hasFile('imagePath')) {  
             $this->validate($request,[
            'title' =>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'imagePath'=>'required|image|mimes:jpeg,png,gif,jpg|max:2048',

            ]);

               $imageName = time().'.'.request()->imagePath->getClientOriginalExtension();
        request()->imagePath->move(public_path('images'), $imageName);

         $product = Product::find($id);
         $product->title = $request->get('title');
         $product->description = $request->get('description');
         $product->price = $request->get('price');
         $product->imagePath=$imageName;
        // update data to the database
        $product->save();
        return redirect()->route('products.index')->with('success','Product Updated');
        }
    else   $this->validate($request,[
        'title' =>'required',
        'description'=>'required',
        'price'=>'required|numeric',
       

        ]);

      

     $product = Product::find($id);
     $product->title = $request->get('title');
     $product->description = $request->get('description');
     $product->price = $request->get('price');
    
    // update data to the database
    $product->save();
    return redirect()->route('products.index')->with('success','Product Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $product['message'] = 'Product deleted!';
        return redirect()->route('products.index')->with('success','Product Deleted');
    }
    public function getIncreaseByOne($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->increaseByOne($id);
        if(count($cart->items) >0){
            Session::put('cart', $cart); 
         }else{
             Session::forget('cart');
         }
        return redirect()->route('product.shoppingCart');

    }

   
public function getHome(){
    return view('shop.home');
}

// save in database
public function store(Request $request){

        // validate input
        $this->validate($request,[
            'title' =>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'imagePath'=>'required|image|mimes:jpeg,png,gif,jpg|max:2048',

        ]);
        
       
        $imageName = time().'.'.request()->imagePath->getClientOriginalExtension();
request()->imagePath->move(public_path('images'), $imageName);
         // add data to the database
        $product = new Product([
            'title' =>$request->get('title'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'imagePath'=>$imageName,
        ]);

        $product->save();
        return redirect()->route('products.index')->with('success','Product Added');
    }

    }
    

