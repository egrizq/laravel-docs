<?php

namespace App\Http\Controllers;

use App\Mail\sendEmailExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserController
{
  public function register_page()
  {
    return view('register');
  }

  public function login_page()
  {
    return view('login');
  }

  public function register(Request $request)
  {
    // validated data
    $validatedData = $request->validate([
      'name' => ['required', 'min:5', 'max:20'],
      'email' => ['required', 'min:5', 'max:30'],
      'password' => ['required', 'min:5', 'max:30'],
    ]);

    // check email is available or not
    $isUsernameExist = DB::table('users')
      ->where('email', $validatedData['email'])
      ->first();

    if ($isUsernameExist) {
      return back()->withErrors(['email' => 'Email already exist!'])->withInput();
    }

    // hash password
    $validatedData['password'] = Hash::make($validatedData['password']);

    try {
      // insert user into database
      // DB::insert(
      // 'INSERT INTO users (name, email, password, created_at, updated_at)
      //       VALUES (?, ?, ?, ?, ?)', [
      //         $validatedData['name'],
      //         $validatedData['email'],
      //         $validatedData['password'],
      //         now(), 
      //         now()
      // ]);

      User::insert($validatedData);

      // navigate into home
      return redirect('/login');
    } catch (Exception $e) {
      return back()
        ->withErrors(['error' => 'An error occurred while creating the account. Please try again.'])
        ->withInput();
    }
  }

  public function login(Request $request)
  {
    // validated data
    $validatedData = $request->validate([
      'email' => ['required', 'min:5', 'max:30'],
      'password' => ['required', 'min:5', 'max:30'],
    ]);

    // check user from database
    $hashPassword = DB::select(
      'SELECT password from users WHERE email = ? LIMIT 1',
      [
        $validatedData['email'],
      ]
    );

    // check if password empty
    if (empty($hashPassword)) {
      return back()->withErrors(['password' => 'Email or Password is incorrect'])->withInput();
    }

    // compare password
    $isPasswordTrue = Hash::check($validatedData['password'], $hashPassword[0]->password);

    if ($isPasswordTrue) {
      return back()->withErrors(['password' => 'Email or Password is incorrect'])->withInput();
    }

    // set session
    $request->session()->regenerate();

    Session::put('email', $validatedData['email']);

    // navigate into home
    return redirect('/home/rizq');
  }

  public function logout(Request $request)
  {
    $data = [
      'message' => 
      "
        Account notification\n\nYou're already logout from you're account\n\nIgnore if this is you. If not report immidiately. \n
      "
    ];
    
    Mail::to('rizq.ramadhan17@gmail.com')->send(new sendEmailExample($data));

    // delete session
    $request->session()->forget('email');

    return redirect('/');
  }
}