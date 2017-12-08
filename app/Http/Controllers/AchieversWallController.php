<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchieversWallController extends Controller
{
   public function index(){
    return view('dashboard.achieverswall');
   }
}
