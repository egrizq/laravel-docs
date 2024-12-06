<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{
  public function welcome()
  {
    return view('welcome');
  }
}