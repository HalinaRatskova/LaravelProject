<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use DB;
use View;
use Redirect;



class AdminController extends Controller
{
    public function authenticated($request,$user){
        $password = $request->input('password');
        if(Auth::attempt(['email'=>'admin@gmail.com','password' => $password])){
            return redirect('shop.admin'); //redirect to admin panel
        }
    
        return redirect()->intended('user.profile'); //redirect to standard user homepage{
          
        }
    
        public function index()
        {
            $users= User::latest()->paginate(3);
            return view('adminuser.index',compact('users'))
                        ->with('i',(request()->input('page',1)-1)*10);
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }
    
        /**
         * Display the specified resource.
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
                $user = User::where('id','LIKE','%'.$q.'%')
                                           ->orWhere('firstName','LIKE','%'.$q.'%') 
                                           ->orWhere('lastName','LIKE','%'.$q.'%') 
                                           ->orWhere('email','LIKE','%'.$q.'%')
                                           ->get();
                                           if(count($user) > 0){
                                               return  view('adminuser.search',compact('user'));
                                           }
                                           return Redirect::back()->withErrors(['No details found. Try to search again!']);
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
            //
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
            //
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
{
    $user =DB::table('users')->where('id',$id)->delete();

    if ($user != null) {
      //  $user->delete();
        return View::make('adminuser.deleteuser')->withSuccess('User is deleted');
    }
   
    return redirect()->back();
} 

        public function getUserProfile(){
            
            
            return view('adminuser.index');
        }
    }

