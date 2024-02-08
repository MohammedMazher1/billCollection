<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{
            if(Auth::user()){
                if(Auth::user()->type=='admin' || Auth::user()->type=='superAdmin'){
                    return view('admin.dashbord');
                }else{
                    return view('welcome');
                }
            }
         }catch(Exception $e){
             return view('notFound');
         }
         return view('welcome');
    }
}
