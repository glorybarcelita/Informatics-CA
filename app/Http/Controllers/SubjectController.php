<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Term;

class SubjectController extends Controller
{
    public function index(){ 
      $subjects = Subject::join('courses', 'subjects.course_id', '=', 'courses.id')
      ->join('terms', 'subjects.term_id', '=', 'terms.id')
      ->select('courses.course_name', 'subjects.year_level', 'terms.term_name', 'subjects.subj_code', 'subjects.subj_name')
      ->get();

      $courses = Course::select('id', 'course_name')
      ->where('status', 'true')
      ->get();

      $terms = Term::get();

      return view('subjects.index', ['subjects'=>$subjects, 'courses'=>$courses, 'terms'=>$terms]);
    }

    public function store(Request $request){
      $data = new Subject();
      return $data->subjectStore($request->course_id, $request->year_level, $request->term_id, $request->subj_code, $request->subj_name);
    }
}
