<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Publication;
use Image;

class PublicationController extends Controller
{
  public function index()
  {
      return Publication::with('user')->lastest()->get();
  }

  public function new(Request $request){

      $publications =  Publication::forceCreate([
          'user_id' => User::find(1),
          'title' => request('title'),
          'description' => request('description'),
          'image' => request('image')
          // 'password' => bcrypt(request('password'))

        ]);
      return $publications->load('user');
  }
  public function new_publication(Request $request){

      $publication = Publication::create([
        'user_id' => User::find(1),
        'title' => request('title'),
        'description' => request('description'),
        'image' => ''
      ]);

      if($request->hasFile('image')){
        $image = $request->file('image');
        $filename= time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(50,50)->save( public_path('/uploads/images/' . $filename) );

        $publication = Auth::user();
        $publication->image = $filename;
        $publication->save();
      }
      return $publication->load('user');
  }
}
