<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::orderBy('created_at', 'DESC')->get();
        return view('collections.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type', 'customer')->get();

        return view('collections.create' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find($request->user);
        $year = date('Y');
        $month = date('m');
        if(!Storage::exists('public/collections/'.$user->name)){
            Storage::makeDirectory('public/collections/'.$user->name);
        }
        if(!Storage::exists('public/collections/'.$user->name.'/'.$year)){
            Storage::makeDirectory('public/collections/'.$user->name.'/'.$year);
        }
        if(!Storage::exists('public/collections/'.$user->name.'/'.$year.'/'.$month)){
            Storage::makeDirectory('public/collections/'.$user->name.'/'.$year.'/'.$month);
        }
        try{
            $file = $request->file('file');
            $date = date('Y-m-d');
            $fileName =$request->file('file')->getClientOriginalName();
            if(Storage::exists('public/collections/'.$user->name.'/'.$year.'/'.$month.'/'.$fileName.'.txt')){
                return redirect()->back()->with('error', 'الملف موجود مسبقا');
            }
            $file->storeAs('public/collections/'.$user->name.'/'.$year.'/'.$month.'/'.$fileName.'.txt');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'لم يتم تخزين الملف');
        }
        try{
            $file = array(
                'file_name' => $fileName.'.txt',
                'user_id' => $request->user,
                'type' => 'collection',
                'download_status' => false,

            );
            File::create($file);

        }catch(Exception $e){
            return redirect()->back()->with('error', ' لم يتم تخزين الملف في قاعدة البيانات');
        }
        return redirect()->route('admin');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
