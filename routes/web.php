<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Request;
use App\Product;
// start page
Route::get('/', [
    'uses'=>'ProductController@getHome',
            'as'=>'homepage'

]);

//show all products
Route::get('/index', [
    'uses'=>'ProductController@getIndex',
    'as'=>'product.index'
]);



//export to pdf file

Route::get('customers','UserController@export_pdf');

Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductController@getAddToCart',
            'as'=>'product.addToCart'

]);

Route::get('/reduce/{id}', [
    'uses'=>'ProductController@getReduceByOne',
            'as'=>'product.reduceByOne'

]);

Route::get('/increase{id}', [
    'uses'=>'ProductController@getIncreaseByOne',
            'as'=>'product.increaseByOne'

]);


Route::get('/remove/{id}', [
    'uses'=>'ProductController@getRemoveItem',
            'as'=>'product.remove'

]);


Route::get('/shopping-cart', [
    'uses'=>'ProductController@getCart',
            'as'=>'product.shoppingCart'

]);

  








Route::get('/checkout',[
    'uses'=>'ProductController@getCheckout',
    'as'=>'checkout',
    'middleware' =>'auth'
]);
Route::post('/checkout',[
    'uses'=>'ProductController@postCheckout',
    'as'=>'checkout',
    'middleware' =>'auth'
]);
Route ::resource('products','ProductController');

Route ::resource('adminuser','AdminController');

Route::any('/searchresult',function(){
    $q = Request::get ( 'q' );
    $user = Product::where('title','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')
    ->orWhere('price', 'LIKE', '%'.$q.'%')->paginate (2)->setPath ( '' );
    if(count($user) > 0)
        return view('shop.searchresult')->withDetails($user)->withQuery ( $q );
       else return Redirect::back()->withErrors(['No details found. Try to search again!']);
        //else return view('shop.searchresult')->with('No Details found', 'Try again!');
});

/*Route::any('/search',function(){
    $qq = Request::get ( 'qq' );
    $userq = Product::where('title','LIKE','%'.$qq.'%')->orWhere('description','LIKE','%'.$qq.'%')
    ->orWhere('price', 'LIKE', '%'.$qq.'%')->paginate (2)->setPath ( '' );
    if(count($userq) > 0)
        return view('products.search')->withDetails($userq)->withQuery ( $qq );
       else return Redirect::back()->withErrors(['No details found. Try to search again!', 'The Message']);
        //else return view('shop.searchresult')->with('No Details found', 'Try again !');
});*/
//Route::any('/shop.admin', [
//'uses'=>'UserController@postSignin',


Route::group(['prefix'=>'user'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::get('/signup', [
            'uses'=>'UserController@getSignup',
            'as'=>'user.signup'
        ]);
    
        Route::post('/signup', [
            'uses'=>'UserController@postSignup',
            'as'=>'user.signup'
        ]);
        
        Route::get('/signin', [
            'uses'=>'UserController@getSignin',
            'as'=>'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses'=>'UserController@postSignin',
            'as'=>'user.signin'
        ]);

    });
    
   /* Route::get('/user.edit', function()
{
    return view('/user.edit');
});*/
//Route::get('/user.edit', 'UserController@edit')->name('user.edit');
//Route::get('/user/edit', 'UserController@edit');



    Route::group(['middleware'=>'auth'], function(){
      Route::get('/profile',[
        'uses'=>'UserController@getProfile',
        'as'=>'user.profile'
    ]);

    
    Route::get('/adminuser/index',[
        'uses'=>'AdminController@getUserProfile',
        'as'=>'adminuser.index'
    ]);

    Route::get('/orders',[
        'uses'=>'UserController@getOrderProfile',
        'as'=>'user.orders'
    ]);
    Route::get('/shop.index',[
        'uses'=>'UserController@getProductProfile',
        'as'=>'shop.index'
    ]);
    Route::get('/admin',[
        'uses'=>'UserController@getAdminProfile',
        'as'=>'user.admin'
    ]);
    
    Route::get('/logout', [
        'uses'=>'UserController@getLogout',
        'as'=>'user.logout'
    ]);  
    Route::get('/edit',  ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::patch('user/update',  ['as' => 'user.update', 'uses' => 'UserController@update']);   
    

  



    
    });
    
});

