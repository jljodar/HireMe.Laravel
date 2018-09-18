<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate the form
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Create and save the user
        $user = User::create([
            'username' => request('username'),
            'name' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        // This is not working, I had to bcrypt the password manually
        //$user = User::create(request(['username', 'email', 'password']));

        // Sign in with the saved user (using the auth() helper function)
        auth()->login($user);

        // Redirect to home page
        return redirect('users/' . $user->id);
    }    
}
