<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("profile")->group(function () {
    Route::get("/edit-name-and-email", "ProfileController@editNameEmail")->name("profile.edit.name.email");
    Route::post("/change-name", "ProfileController@changeName")->name("profile.change.name");
    Route::post("/change-email", "ProfileController@changeEmail")->name("profile.change.email");
    Route::get("/edit-password", "ProfileController@editPassword")->name("profile.edit.password");
    Route::post("/change-password", "ProfileController@changePassword")->name("profile.change.password");
    Route::get("/edit-photo", "ProfileController@editPhoto")->name("profile.edit.photo");
    Route::post("/change-photo", "ProfileController@changePhoto")->name("profile.change.photo");
});
