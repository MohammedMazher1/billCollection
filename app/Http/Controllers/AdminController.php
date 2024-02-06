<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function index(){

        return view('admin.dashbord');
    }

    public function checkIfFolderExsist(){
        $date = date('Y-m-d');
        return $date;
        // $file = 'file.txt';
        // if(Storage::disk('public')->exists($file)){
        //     return 'yes';
        // }else{
        //     return 'no';
        // }
    }
}
