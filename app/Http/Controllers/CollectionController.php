<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type', 'customer')->get();

        return view('collections.create' , compact('users'));
    }

    // public function checkIfFolderExsist(){
    //     $file = 'mohammed';
    //     if(file_exists($file)){
    //         return 'file exist';
    //     }
    //     return 'file does not exist';
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $year = date('Y');
        $month = date('m');
        // return public_path();
        if(!Storage::exists('public/collections/'.$year.'/'.$month)){
            Storage::makeDirectory('public/collections/'.$year.'/'.$month);
        }
        try{
            $file = $request->file('file');
            $date = date('Y-m-d');
            $fileName = date('Y-m-d' , strtotime($date . '-1 day'));
            if(Storage::exists('public/collections/'.$year.'/'.$month.'/'.$fileName.'.txt')){
                return redirect()->back()->with('error', 'الملف موجود مسبقا');
            }
            $file->storeAs('public/collections/'.$year.'/'.$month, $fileName.'.txt');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'لم يتم تخزين الملف');
        }
    }
    // $next_date = date('Y-m-d', strtotime($date .' +1 day'));
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
