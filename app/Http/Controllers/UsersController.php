<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Applicance;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function companiesIndex(User $user)
    {
        $companies = Company::where('user_id', $user->id)->get();

        return view('companies.index', compact('companies', 'user'));
    }

    public function applicancesIndex(User $user)
    {
        $applicances = Applicance::where('user_id', $user->id)->get();

        return view('applicances.index', compact('applicances', 'user'));
    }
}
