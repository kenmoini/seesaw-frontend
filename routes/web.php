<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\SettingController;

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
})->name('home');

//==============================================================================
// Admin Routes
//==============================================================================
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function(){

  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard');

  //============================================================================
  // Thread Routes
  //============================================================================
  // CRUD Resource Routes
  Route::resource('threads', ThreadController::class)->name('*', 'threads');  
  
  // Add Post to Thread Route
  Route::post('/threads/{id}/add-post', 'App\Http\Controllers\ThreadController@addPost')->middleware(['auth', 'verified'])->name('threads.addPost');

  //============================================================================
  // Settings Routes
  //============================================================================
  // CRUD Resource Routes
  Route::resource('settings', SettingController::class)->name('*', 'settings'); 
});

require __DIR__.'/auth.php';
