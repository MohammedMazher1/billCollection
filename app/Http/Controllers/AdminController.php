<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
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

    public function cycleFiles(){

        $files = File::where('type','cycleFiles')
        ->where('download_status' , '0')->orderBy('created_at', 'desc')->get();

        return view('admin.cycleFiles', compact('files'));

    }
    public function downloadFile($id){
        $year = date('Y');
        $month = date('m');
        try{
            $file = File::find($id);
            $file->download_status = 1;
            $file->save();
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'لم يتم تنزيل الملف');
        }
        return Storage::download('public/cycleFiles/'.$file->user->name.'/'.$year.'/'.$month.'/'.$file->file_name);

    }
}
