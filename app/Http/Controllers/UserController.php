<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\OrderProduct;
use App\Product;
use AuthenticatesUsers;
use Auth;
use DB;
use App\Cart;
use Session;
use Redirect;
use Storage;
use PDF;

class UserController extends Controller
{//show signup page
    public function getSignup(){
        return view('user.signup');
    }

    //method to make signup
    public function postSignup(Request $request){
        $this->validate($request, [
            'firstName'=>'required|regex:/^[a-zA-Z]+$/u',
            'lastName'=>'required|regex:/^[a-zA-Z]+$/u',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:4'
        ]);
        $user=new User([
            'firstName'=>$request->input('firstName'),
            'lastName'=>$request->input('lastName'),
            'email'=>$request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('user.profile');
    }

    //show signin page
    public function getSignin(){
        return view('user.signin');
    }
    //method to validation password and email
    public function postSignin(Request $request){
        $this->validate($request, [
            'email'=>'email|required',
            'password'=>'required|min:4'
        ]);
       
        $password = $request->input('password');
        if(Auth::attempt(['email'=>'admin@gmail.com','password' => $password])){
            return redirect()->route('user.admin'); //redirect to admin panel
        }
       
       elseif( Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
           return redirect()->route('user.profile');
          
      }
      else return Redirect::back()->withErrors(['Wrong email or password. Try to login again!']);
        //return redirect()->back();
    }




    public function index(Request $request)
    {
        $customer = $request->user()->toCustomer();
        $orders = Order::findAllByCustomer($customer);
        return view('user/profile', array(
            'orders' => $orders,
        ));
    }
    //method show user profile
    public function getProfile(){
        //$orders = Auth::user()->orders;
        //$orders->transform(function($order, $key){
        //    $order->user_id;
        //    return $order;
        $invoices = Order::where('user_id', Auth::user()->id)->join('order_product', 
        'order_product.order_id', '=', 'orders.id')->join('products', 
        'products.id', '=', 'order_product.product_id')->join('users', 
        'users.id', '=', 'orders.user_id')->get();
                    
        return view('user.profile',compact('invoices'));
    }
/*
    public function getOrderProfile(){
        //$orders = Auth::user()->orders;
        //$orders->transform(function($order, $key){
        //    $order->user_id;
      
        
        $invoices = Order::where('user_id', Auth::user()->id)->join('order_product', 
        'order_product.order_id', '=', 'orders.id')->join('products', 
        'products.id', '=', 'order_product.product_id')->join('users', 
        'users.id', '=', 'orders.user_id')->get();
       // $invoice = Order::select('user_id', Auth::user()->id)->groupBy('user_id')->get();
        $invoice = DB::table('orders')->
        where('user_id', Auth::user()->id)
                ->orderByRaw('id ASC')
                ->get();
        return view('user.orders', compact('invoices', 'invoice')); 

    }
    */

    //method show order details
    public function getOrderProfile(){
        $invoices = Order::where('user_id', Auth::user()->id)->join('order_product', 
        'order_product.order_id', '=', 'orders.id')->join('products', 
        'products.id', '=', 'order_product.product_id')->join('users', 
        'users.id', '=', 'orders.user_id')->get();


        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('user.orders', compact('invoices'));     

}

    public function vieworders()
    {
        $invoices = Order::where('user_id',Auth::user()->id)->join('order_product', 
        'order_product.order_id', '=', 'orders.id')->join('products', 
        'products.id', '=', 'order_product.product_id')->join('users', 
        'users.id', '=', 'orders.user_id')->get();
       
        //$product->save();
        return view('user.showorders',compact('invoices'));
    }
   
    //show admin page
    public function getAdminProfile(){
        //$orders = Auth::user()->orders;
        //$orders->transform(function($order, $key){
        //    $order->user_id;
        //    return $order;
       
        return view('user.admin');
    }
    //show product page
    public function  getProductProfile(){
        return view('shop.index');
    }
//logout
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }
    public function update(Request $request)
    { 
        $this->validate(request(), [
            'firstName' =>"required",
            'lastName'=>'required',
            'email' =>'required|email|',
            'password' =>'required|min:4|confirmed'
        ]);
        $user = Auth::user();
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        
        $user->save();
       
        return redirect()->route('user.profile')->with('info','User Updated');
    }
    
    //export order details to pdf file
    public function export_pdf()
    {
       
    
 $data['invoices']= Order::where('user_id', Auth::user()->id)->join('order_product', 
        'order_product.order_id', '=', 'orders.id')->join('products', 
        'products.id', '=', 'order_product.product_id')->join('users', 
        'users.id', '=', 'orders.user_id')->get();
     
      $pdf = PDF::loadView('user.filepdf', $data);

Storage::put('public/pdf/customers.pdf', $pdf->output());

return $pdf->download('info.pdf');
      
    }
}
