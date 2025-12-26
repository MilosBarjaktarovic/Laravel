<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{

   
   public function index()
   {
   $realTime = date('H:i:s');
   $realDate = date('Y-m-d');
   return view('home', compact('realTime', 'realDate'));
   }
}
