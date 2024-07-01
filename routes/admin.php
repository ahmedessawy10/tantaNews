<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboard\SettingController;

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




Route::middleware(["auth",'role:admin'])->prefix('admin')->name('admin.')->group(function(){


Route::view('/dashboard','adminDashboard.index')->name('dashboard');

Route::resource('setting',SettingController::class);

});
