<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController
{
  public function home(request $request)
  {
    $isSessionExist = $request->session()->has('email');
    if (!$isSessionExist) {
      return view('welcome', ['notif' => true]);
    }

    $email = $request->session()->get('email');

    return view('home', ['email' => $email]);
  }
}