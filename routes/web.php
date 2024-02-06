<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminControllerController;
use App\Http\Controllers\CollectionController;
use Illuminate\Database\Eloquent\Collection;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return view('admin.dashbord');
});
Route::get('admin',[AdminController::class,'index'])->name('admin');
Route::get('file',[AdminController::class,'checkIfFolderExsist'])->name('file');
Route::resource('users',UserController::class);
Route::resource('collection',CollectionController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
