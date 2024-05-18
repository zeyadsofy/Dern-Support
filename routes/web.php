<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/',function(){
    return redirect('/login');
});
Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard'])->name("admin_dash");

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');

    #catergy
    Route::get('/category',[CategoryController::class, 'index'])->name('category');
    Route::get('/Addcategory',[CategoryController::class, 'create'])->name('Addcategory');
    Route::post('/Addcategory',[CategoryController::class, 'store'])->name('add_category');
    Route::get('/Editcategory/{id}',[CategoryController::class, 'show'])->name('Edit_category');
    Route::put('/Editcategory',[CategoryController::class, 'edit'])->name('Edit_category1');
    Route::delete('/deletecategory/{id}',[CategoryController::class, 'destroy'])->name('delete_category');
    #service
    Route::get('/service',[ServiceController::class, 'index'])->name('service');
    Route::get('/addService',[ServiceController::class, 'create'])->name('addService');
    Route::post('/addService',[ServiceController::class, 'store'])->name('addService1');
    Route::get('/editService/{id}',[ServiceController::class, 'show'])->name('editService');
    Route::put('/editService',[ServiceController::class, 'edit'])->name('editService1');
    Route::delete('/deleteService/{id}',[ServiceController::class, 'destroy'])->name('deleteService');
    #request
    Route::get('/request',[RequestsController::class, 'index'])->name('request');
    Route::delete('/deleteRequest/{id}',[RequestsController::class, 'destroy1'])->name('deleteRequest1');


});

// // ********** Sub Admin Routes *********
// Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
//     Route::get('/dashboard',[SubAdminController::class,'dashboard']);
// });

// // ********** Admin Routes *********
// Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
//     Route::get('/dashboard',[AdminController::class,'dashboard']);
// });

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
    Route::get('/service',[ServiceController::class, 'user'])->name('service1');
    Route::get('/addRequest/{id}',[RequestsController::class, 'create'])->name('addRequest');
    Route::post('/addRequest/{id}',[RequestsController::class, 'store'])->name('addRequest');
    Route::delete('/deleteRequest/{id}',[RequestsController::class, 'destroy'])->name('deleteRequest');

});
