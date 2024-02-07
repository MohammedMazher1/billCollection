<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminControllerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('admin', function () {
    return view('admin.dashbord');
});
// Route::get('file',[AdminController::class,'checkIfFolderExsist'])->name('file');
Route::resource('users',UserController::class);
Route::resource('collection',CollectionController::class);

// Route::resource('download{id}',[FileController::class ,'download']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('admin')->group(function () {
    Route::get('admin',[AdminController::class,'index'])->name('admin');
});

Route::middleware('customer')->group(function () {
    Route::resource('files',FileController::class);
});
