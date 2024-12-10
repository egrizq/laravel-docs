<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController
{
  public function home(Request $request)
  {
    $isSessionExist = $request->session()->has('email');
    if (!$isSessionExist) {
      return view('welcome', ['notif' => true]);
    }

    $email = $request->session()->get('email');

    return view('home', ['email' => $email]);
  }

  public function handle_photo(Request $request) 
  {
    $validatePhoto = $request->validate([
        'image' => ['required', 'image', 'max:4000']
      ]);
    
    // move image into /public/images
    $imageName = time() . '.' . $validatePhoto['image']->extension();
    $request->image->move(public_path('images'), $imageName);

    // Redirect after saving the image
    return redirect('/')->with('success', 'Image uploaded successfully!');
  }
}