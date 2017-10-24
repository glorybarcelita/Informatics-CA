<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IcaSubjectController extends Controller
{
  public function index(){ 
    // $courses = Course::select('id', 'course_name')
    // ->where('status', 'true')
    // ->get();

    // $terms = Term::get();

    return view('icaSubject.index');
  }
}
