<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offer;
use App\Company;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $offersCount = Offer::count();
        $newOffersCount = Offer::where('created_at', '>', strtotime('-7 days'))->count();

        $companiesCount = Company::count();
        $newCompaniesCount = Company::where('created_at', '>', strtotime('-7 days'))->count();
        
        $usersCount = User::count();
        $newUsersCount = User::where('created_at', '>', strtotime('-7 days'))->count();

        return view('home', compact(['offersCount', 'newOffersCount', 'companiesCount', 'newCompaniesCount', 'usersCount', 'newUsersCount']));
    }
}
