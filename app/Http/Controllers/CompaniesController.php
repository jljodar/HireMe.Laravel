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
        $companies = new Company();

        $companies = $companies->orderBy('name');

        if(request()->query('filter')) {
            $filters = explode(" ", request()->query('filter'));

            foreach($filters as $filter) {
                $companies = $companies->Where('name', 'LIKE', '%' . $filter . '%');
            }
        }

        // Open positions filter
        if(request()->query('openPositions') == "true") {
            $companies = $companies->whereHas('offers', function ($query) {
                $query->whereDate('offers.started_at', '<=', new \DateTime())
                    ->whereDate('offers.ended_at', '>=', new \DateTime());
            });
        } else if(request()->query('noOpenPositions') == "true") {
            $companies = $companies->whereDoesntHave('offers', function ($query) {
                $query->whereDate('offers.started_at', '<=', new \DateTime())
                    ->whereDate('offers.ended_at', '>=', new \DateTime());
            });
        }

        // Paginate
        $companies = $companies->paginate(10);

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
            'name' => 'required',
            'industry' => 'required',
            'description' => 'required',
        ]);

        // Create a company with user_id
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

        /* Alternatively we could have created a publish method in our User and call it here for auto-asign the user_id

        auth()->user()->publish(
            new Company(request(['name', 'industry', ...]))
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
