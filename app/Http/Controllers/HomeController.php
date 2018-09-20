<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $dateLastWeek = Carbon::now()->subDays(7);

        $offersCount = Offer::count();
        $newOffersCount = Offer::where('created_at', '>', $dateLastWeek)->count();

        $companiesCount = Company::count();
        $newCompaniesCount = Company::where('created_at', '>', $dateLastWeek)->count();
        
        $usersCount = User::count();
        $newUsersCount = User::where('created_at', '>', $dateLastWeek)->count();

        return view('home', compact(['offersCount', 'newOffersCount', 'companiesCount', 'newCompaniesCount', 'usersCount', 'newUsersCount']));
    }
}
