<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(3);

        return view("user.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                "name" => "required|max:255",
                "user_name" => "required",
                "password" => "required",
                'id' => 'required',
                ]);
            }catch(Exception $e){
                return redirect()->back()->with('error','جميع الحقول مطلوبة');
            }
            try{
                $creationData = $request->only(["id","name","user_name","password"]);
                $creationData["password"] = Hash::make($request->password);
                $creationData["type"] = "customer";
                 User::create($creationData);
            }catch(Exception $e){
                return redirect()->back()->with('error','حدث خطاء في تخزين البيانات');
            }

             return redirect()->route("users.index");
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
        $user = User::find($id);

        return view("user.edit", compact("user"));
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route("users.index");
    }
}
