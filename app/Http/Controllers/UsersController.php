<?php

namespace App\Http\Controllers;

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
        if(auth()->check() && auth()->id() == $user->id) {
            // Go to edit your own profile
            return view('users.edit', compact('user'));
        } else {
            // Increment profile visits
            $user->increment('profile_visits');

            return view('users.show', compact('user'));
        }
    }

    public function update(User $user)
    {
        // Validate the form
        $this->validate(request(), [
            'name' => 'required'
        ]);

        // Update and save the user
        $user->update([
            'name' => request('name'),
            'last_name' => request('last_name', ''),

            'address' => request('address', ''),
            'city' => request('city', ''),
            'country' => request('country', ''),
            'postal_code' => request('postal_code', ''),

            'about_me' => request('about_me', ''),
        ]);

        // Redirect to the updated user's profile
        return redirect('users/' . $user->id);
    }


    public function companiesIndex(User $user)
    {
        $companies = Company::where('user_id', $user->id)->paginate(10);

        return view('users.companies.index', compact('companies', 'user'));
    }

    public function applicancesIndex(User $user)
    {
        $applicances = Applicance::where('user_id', $user->id)->paginate(10);

        return view('users.applicances.index', compact('applicances', 'user'));
    }
}
