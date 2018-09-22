<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\Offer;
use App\Company;
use App\Applicance;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index()
    {
        return view('index');
    }
}
