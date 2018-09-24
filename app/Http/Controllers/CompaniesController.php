<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Offer;

class CompaniesController extends Controller
{
    public function __construct()
    {
        // Requiere authentication
        $this->middleware('auth');
    }


    public function index()
    {
        $companies = Company::filter(request(['search', 'openPositions', 'noOpenPositions']))
            ->orderBy('name')
            ->paginate(10);

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
        //   The errors will be available in Blade through $errors variable
        $this->validate(request(), [
            'name' => 'required',
            'industry' => 'required',
            'description' => 'required',
        ]);

        // Create with relationships
        $company = new Company();
        $company->user_id = auth()->id();

        // Fill the rest of the fields with the request
        $company->fill(request()->all());

        // Fill the rest of the fields with the request
        //   We can't use the shorthand  $company->fill(request()->all());  because we need to provide default values for non-requiered fields
        /*$company->fill([
            'name' => request('name'),
            'industry' => request('industry'),
            'description' => request('description'),

            'address' => request('address', ''),
            'city' => request('city', ''),
            'country' => request('country', ''),
            'postal_code' => request('postal_code', ''),
        ]);*/

        $company->save();

        /* Alternatively we could have created a publish method in our User and call it here to auto-assign the user_id

        auth()->user()->publish(
            new Company(request(['name', 'industry', ...]))
        );*/

        // Redirect to company's profile
        return redirect('/companies/' . $company->id);
    }

    // Thanks to the "Route Model Binding", Laravel automatically reads the Company with the id provided in route
    public function show(Company $company)
    {
        if(auth()->check() && auth()->id() == $company->user_id) {
            // Go to edit your own company
            return view('companies.edit', compact('company'));
        } else {
            return view('companies.show', compact('company'));
        }
    }

    public function update(Request $request, Company $company)
    {
        // Validate the form
        $this->validate(request(), [
            'name' => 'required'
        ]);

        // Update and save
        $company->update([
            'name' => request('name'),
            'industry' => request('industry', ''),

            'description' => request('description', ''),

            'address' => request('address', ''),
            'city' => request('city', ''),
            'country' => request('country', ''),
            'postal_code' => request('postal_code', ''),
        ]);

        // Redirect to the updated company's profile
        return redirect('companies/' . $company->id);
    }


    public function offerCreate(Company $company)
    {
        return view('companies.offers.create', compact('company'));
    }

    public function offerStore(Company $company)
    {
        // Validate the request data
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
        ]);

        // Create with relationships
        $offer = new Offer();
        $offer->user_id = auth()->id();
        $offer->company_id = $company->id;

        // Fill the rest of the fields with the request
        $offer->fill(request()->all());

        $offer->save();

        // Redirect to the company profile
        return redirect('/companies/' . $company->id);
    }
}
