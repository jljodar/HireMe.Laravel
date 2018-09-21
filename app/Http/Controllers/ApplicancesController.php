<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Applicance;
use App\Offer;

class ApplicancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}
