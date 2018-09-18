<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Offer;

class CompaniesController extends Controller
{
    public function __construct()
    {
        // Requiere authentication for majority of functions
        $this->middleware('auth');
    }


    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store()
    {
        // Validate the request data
        //   If anything fails, it will redirect to the same page
        //   The errors will be avaible in blade thought $errors variable
        $this->validate(request(), [
            'name' => 'required'
        ]);

        // Create 
        Company::create([
            'name' => request('name'),
            'industry' => request('industry'),
            'user_id' => auth()->id(),
        ]);

        /* Alternatively we could have created a publish method in our User and call it here for auto-asign the user_id

        auth()->user()->publish(
            new Company(request(['name', 'industry']))
        );*/

        // Redirect to home page
        return redirect('/');
    }

    // Thanks to the "Route Model Binding", Laravel automatically read the Company with the id provided in route
    public function show(Company $company)
    {
        $offers = Offer::where('company_id', $company->id)->get();

        return view('companies.show', compact('company', 'offers'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
