<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index(){
      $curriculum = curriculum::get();

      return view('curriculum.index', ['curriculum'=>$curriculum]);
    }
}
