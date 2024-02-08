<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){

        return view('admin.dashbord');
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

    public function create()
    {
        $users = User::where('type', 'customer')->get();

        return view('admin.accountFile' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find($request->user);
        $year = date('Y');
        $month = date('m');
        if(!Storage::exists('public/accountFiles/'.$user->name)){
            Storage::makeDirectory('public/accountFiles/'.$user->name);
        }
        if(!Storage::exists('public/accountFiles/'.$user->name.'/'.$year)){
            Storage::makeDirectory('public/accountFiles/'.$user->name.'/'.$year);
        }
        if(!Storage::exists('public/accountFiles/'.$user->name.'/'.$year.'/'.$month)){
            Storage::makeDirectory('public/accountFiles/'.$user->name.'/'.$year.'/'.$month);
        }
        try{
            $file = $request->file('file');
            $date = date('Y-m-d');
            $fileName = date('Y-m-d' , strtotime($date . '-1 day'));
            if(Storage::exists('public/accountFiles/'.$user->name.'/'.$year.'/'.$month.'/'.$fileName.'.'.$request->file('file')->extension())){
                return redirect()->back()->with('error', 'الملف موجود مسبقا');
            }
            $file->storeAs('public/accountFiles/'.$user->name.'/'.$year.'/'.$month.'/'.$fileName.'.'.$request->file('file')->extension());
        }catch(Exception $e){
            return redirect()->back()->with('error', 'لم يتم تخزين الملف');
        }
        try{
            $file = array(
                'file_name' => $fileName.'.'.$request->file('file')->extension(),
                'user_id' => $request->user,
                'type' => 'accountFile',
                'download_status' => false,

            );
            File::create($file);

        }catch(Exception $e){
            return redirect()->back()->with('error', ' لم يتم تخزين الملف في قاعدة البيانات');
        }
        return redirect()->route('admin');
    }

    public function accountFiles(){
        $user = Auth::user();
        $files = File::where('user_id', $user->id)
        ->where('type','accountFile')
        ->where('download_status' , '0')->orderBy('created_at', 'desc')->get();

        return view('files.listAccountFiles', compact('files'));

    }
    public function download($id)
    {
        $user = Auth::user();
        $year = date('Y');
        $month = date('m');
        try{
            $file = File::find($id);
            $file->download_status = 1;
            $file->save();

        }catch(Exception $e){
            return redirect()->back()->with('erroe','لم يتم تنزيل الملف');
        }


        return Storage::download('public/accountFiles/'.$user->name.'/'.$year.'/'.$month.'/'.$file->file_name);

    }
}
