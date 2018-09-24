<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        //   Using a custom validator to send back an indicator to the view to show Register tab instead of Login

        $validator = Validator::make(request()->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'registrationErrors')
                ->with('backToRegister', true);
        }


        // Create and save the user
        $user = User::create([
            'username' => request('username'),
            'name' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        // Sign in with the saved user (using the auth() helper function)
        auth()->login($user);

        // Redirect to home page
        return redirect('users/' . $user->id);
    }
}
