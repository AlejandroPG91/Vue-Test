<?php

use App\Events\MessagePosted;
use App\Message;
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
    return view('layouts/index');
});

Auth::routes();


// Route::get('/home', 'HomeController@index');
Route::get('/home', 'UserController@index');
Route::post('/register', 'UserController@store');
// Route::post('/login', 'LoginController@login');

Route::get('/messages', function() {
  return Message::with('user')->get();
});

Route::post('/messages', function () {
  //store the new message
  $user = Auth::user();
  // $message = request()->get('message');
  $message = $user->messages()->create([
    'message' => request()->get('message')
  ]);
  //Announce that a new message has been posted
  broadcast(new MessagePosted($message, $user))->toOthers();

  return ['status' => 'OK'];
})->middleware('auth');



Route::get('/publication', 'PublicationController@index');
Route::post('/publication', 'PublicationController@new_publication');
// Route::post('/publication', function () {
//   //store the new message
//   $user = Auth::user();
//   // $message = request()->get('message');
//   $publication = $user->publication()->create([
//     'title' => request()->get('title'),
//     'description' => request()->get('description'),
//     'image' => request()->get('image')
//   ]);
//
//   return ['publication' => 'OK'];
// })->middleware('auth');
