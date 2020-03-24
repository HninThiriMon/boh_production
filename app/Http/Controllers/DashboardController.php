<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/index');
    }
   
    public function brand()
    {
        return view('dashboard/brand');
    }

    public function ourCompany()
    {
        return view('dashboard/our_company');
    }

    public function contactUs()
    {
        
        return view('dashboard/contact_us');
    }
   
    public function clients()
    {
       
        return view('dashboard/clients');
    }

    public function company()
    {
        return view('dashboard/company');
    }




}
