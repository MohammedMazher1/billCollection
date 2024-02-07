<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $files = File::where('user_id', $user->id)->where('download_status' , '0')->orderBy('created_at', 'desc')->get();
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        $user = Auth::user();
        $year = date('Y');
        $month = date('m');
        $file = File::find($file->id);
        $content = Storage::disk('public')->get('collections/'.$user->name.'/'.$year.'/'.$month.'/'.$file->file_name);
        $lines = explode("\n", $content);
        // Split each line into values using semicolon as a delimiter
        $data_array = array_map(function ($line) {
            return explode(';', $line);
        }, $lines);

        $data_array = array_splice($data_array,1);
        array_pop($data_array);
        return view('files.display', compact('data_array'));
    }

    // public function download(File $file){

    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        $user = Auth::user();
        $year = date('Y');
        $month = date('m');
        try{
            $file = File::find($file->id);
            $file->download_status = 1;
            $file->save();

        }catch(\Exception $e){
            return redirect()->route('files.index')->with('erroe','لم يتم تنزيل الملف');
        }


        return Storage::download('public/collections/'.$user->name.'/'.$year.'/'.$month.'/'.$file->file_name);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }

}
