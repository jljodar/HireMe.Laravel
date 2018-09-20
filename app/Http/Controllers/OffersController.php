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
        // latest is a shortcut of:  orderBy('created_at', 'desc')
        $offers = Offer::latest()->paginate(10);

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
