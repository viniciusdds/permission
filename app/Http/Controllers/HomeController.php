<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {       
        return view('home');
    }
    
    public function permission() 
    {
        $users = User::get();
        
        //dd($users);
        
        return view('permission.permission', compact('users'));
    }
    
    public function newPermission(Request $request) {       
      // dd($request->all());
       //$user = User::find($request->name);
//        
//        $user->update([ 'user_type' => $request->user_type ]);
         
       $user = User::find($request->name);
       $user->user_type = $request->user_type;
       $user->save();
       
       // dd($user->update([ 'user_type' => $request->user_type ])); 
        return redirect()->route('permission')
                ->with('success','Produto alterado com sucesso.');
    }
    
    public function productList() {
        return view('products.index');
    }
}
