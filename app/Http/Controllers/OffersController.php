<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offer;
use App\Applicance;

class OffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $offers = Offer::whereDate('offers.started_at', '<=', new \DateTime())
            ->whereDate('offers.ended_at', '>=', new \DateTime())
            ->filter(request(['search', 'company-search']))
            ->orderBy('started_at', 'desc')
            ->paginate(10);

        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        auth()->user()->publish(
            new Offer(request(['name', 'industry']))
        );

        return redirect('/');
    }

    public function show(Offer $offer)
    {
        $applicance = Applicance::where('user_id', auth()->id())
            ->where('offer_id', $offer->id)
            ->first();

        $alreadyApplied = ($applicance != null);

        return view('offers.show', compact('offer', 'alreadyApplied'));
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


    public function applicancesStore(Offer $offer)
    {
        // Create a company with user_id
        $applicance = new Applicance();
        $applicance->user_id = auth()->id();
        $applicance->offer_id = $offer->id;
        
        // Fill the rest of the fields with the request
        $applicance->fill(request()->all());

        $applicance->save();

        // Redirect to home page
        return redirect('/users/' . auth()->id() . '/applicances');
    }
}
