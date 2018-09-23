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

    public function show(Offer $offer)
    {
        if(auth()->check() && auth()->id() == $offer->user_id) {
            // Go to edit your own offer
            return view('offers.edit', compact('offer'));
        } else {
            $applicance = Applicance::where('user_id', auth()->id())
                ->where('offer_id', $offer->id)
                ->first();

            $alreadyApplied = ($applicance != null);

            return view('offers.show', compact('offer', 'alreadyApplied'));
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Offer $offer)
    {
        // Validate the form
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
        ]);

        // Update and save
        $offer->update([
            'title' => request('title'),
            'body' => request('body'),

            'started_at' => request('started_at'),
            'ended_at' => request('ended_at'),
        ]);

        // Redirect to the company's profile
        return redirect('companies/' . $offer->company->id);
    }

    public function destroy($id)
    {
        //
    }


    public function applicancesStore(Offer $offer)
    {
        // Create with relationships
        $applicance = new Applicance();
        $applicance->user_id = auth()->id();
        $applicance->offer_id = $offer->id;

        // Validate integrity constraint
        if(Applicance::where('user_id', '=', $applicance->user_id)
            ->where('offer_id', '=', $applicance->offer_id)
            ->exists())
        {
            // Redirect back (to the same page)
            return back()->withErrors([
                'message' => 'You already applied to this offer.'
            ]);
        }

        // Fill the rest of the fields with the request
        $applicance->fill(request()->all());

        $applicance->save();

        // Redirect to user applicances
        return redirect('/users/' . auth()->id() . '/applicances');
    }
}
