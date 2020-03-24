<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function design()
   {
        return view('service/design');
   }

   public function supply()
   {
        return view('service/supply');
   }

   public function install()
   {
        return view('service/install');
   }

   public function maintain()
   {
        return view('service/maintain');  
   }



}
