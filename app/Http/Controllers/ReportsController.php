<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
   public function lecturerReport(){    
    return view('lecturer.reports');
  }
}
