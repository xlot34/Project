<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminPanelController;
use App\Http\Controllers\Frontend\UserPanelController;

//ADMIN-USER CONTROL
Route::get('/redirectPanel', function () {
    if(Auth::check() && Auth::user()->yetki()>0) {
        return redirect('/panel');
    }else{
        return redirect('/account');
    }
});

//FRONTEND ROOT
Route::get('/', function () { return view('welcome');});
Route::get('/home', function () { return view('home');});

//USER ROUTE
Route::group(['prefix'=>'account', 'middleware'=>'User'], function() {
    Route::get('/', [UserPanelController::class, 'index'])->name('userPanel');;
});
//ADMIN ROUTE
Route::group(['prefix'=>'panel', 'middleware'=>'Admin'], function() {
    Route::get('/', [AdminPanelController::class, 'index'])->name('adminPanel');;
});
Auth::routes();


