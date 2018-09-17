<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        // Only guests will be allow to go through the Sign In page
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Attempt to authenticate the user and password (and sign in)
        if (! auth()->attempt(request(['email', 'password']))) {
            // Redirect back (to the same page)
            return back()->withErrors([
                'message' => 'Email or password incorrect.'
            ]);
        }

        // Redirect to home page
        return redirect()->home();

    }

    public function destroy()
    {
        // Sign out the user (using the auth() helper function)
        auth()->logout();

        // Redirect to home page
        return redirect()->home();
    }
}
