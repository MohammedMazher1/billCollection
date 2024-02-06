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

        // return public_path();
        $file = 'mohammed';
        if(Storage::disk('local')->exists($file)){
            return 'yes';
        }else{
            return 'no';
        }
    }
}
