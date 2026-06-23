<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Storage;

// Guest Login Routes
Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/register_submit', [AuthController::class, 'registersubmit'])->name('register.submit');
Route::get('/no_internetconnection', [AuthController::class, 'no_internetconnection'])->name('no_internetconnection');





Route::middleware(['valid.login','valid.connection'])->group(function () {
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Sample Protected Desktop Dashboard Route
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('desktop.dashboard');




Route::get('/goals', 'App\Http\Controllers\GoalsController@index')->name('goals');
Route::get('/Addgoal', 'App\Http\Controllers\GoalsController@Addgoal')->name('Addgoal');
Route::post('/addgoal_save', 'App\Http\Controllers\GoalsController@addgoal_save')->name('addgoals');
Route::get('/addgoalamount', 'App\Http\Controllers\GoalsController@addgoalamount')->name('addgoalamount');
Route::post('/addgoalsAmount_save', 'App\Http\Controllers\GoalsController@addgoalsAmount_save')->name('addgoalsAmount_save');
Route::get('/deletegoals', 'App\Http\Controllers\GoalsController@deletegoals')->name('deletegoals');


Route::get('/groups', 'App\Http\Controllers\GroupsController@index')->name('groups');
Route::get('/Addgroup', 'App\Http\Controllers\GroupsController@Addgroup')->name('Addgroup');
Route::post('/Addgroup_save', 'App\Http\Controllers\GroupsController@Addgroup_save')->name('Addgroup_save');
Route::get('/contributegroup', 'App\Http\Controllers\GroupsController@contributegroup')->name('contributegroup');
Route::post('/contribute_save', 'App\Http\Controllers\GroupsController@contribute_save')->name('contribute_save');
Route::get('/veiwmember', 'App\Http\Controllers\GroupsController@veiwmember')->name('veiwmember');
Route::get('/viewcontribution', 'App\Http\Controllers\GroupsController@viewcontribution')->name('viewcontribution');
Route::get('/Addmember', 'App\Http\Controllers\GroupsController@Addmember')->name('Addmember');
Route::post('/addmembersave', 'App\Http\Controllers\GroupsController@addmembersave')->name('addmembersave');



Route::get('/buying', 'App\Http\Controllers\BuyingController@index')->name('buying');




Route::get('/Profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::post('/changepasssword', 'App\Http\Controllers\ProfileController@changepasssword')->name('changepasssword');








 
   

});



