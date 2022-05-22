<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Category;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function category(){

        return view('category.category');
    }
    public function addcategory(Request $request){
        
        $request->session()->push('user.teams', $request->category);
        return redirect()->back()->with('message', 'Successfully');
        
    }

    public function savedata(){
       $saveda= Session::get('user.teams');
       foreach($saveda as $value){
        $datacategry = new Category;
        $datacategry->category = $value;
        $datacategry->save();    
       }
       Session::forget('user.teams');
       return redirect()->back()->with('message', 'Successfully Saved Data');

       //$session()->forget('user.teams');
      
       // print_r($saveda);
    }
}



