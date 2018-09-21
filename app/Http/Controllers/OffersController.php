<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

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
        return view('offers.show', compact('offer'));
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
