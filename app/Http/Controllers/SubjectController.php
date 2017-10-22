<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Term;

class SubjectController extends Controller
{
    public function index(){ 
      $courses = Course::select('id', 'course_name')
      ->where('status', 'true')
      ->get();

      $terms = Term::get();

      return view('subjects.index', ['courses'=>$courses, 'terms'=>$terms]);
    }

    public function select(){
      $subjects = Subject::join('courses', 'subjects.course_id', '=', 'courses.id')
      ->join('terms', 'subjects.term_id', '=', 'terms.id')
      ->select('subjects.*', 'courses.course_name', 'terms.term_name')
      ->orderBy('terms.id', 'ASC  ')
      ->get();

      return $subjects;
    }

    public function store(Request $request){
      $this->validate($request,[
        'subj_code' => 'required',
        'subj_name' => 'required',
      ]);

      // return $request->all();
      $data = new Subject();
      return $data->subjectStore($request->course_id, $request->year_level, $request->term_id, $request->subj_code, $request->subj_name);
    }

    public function edit(Request $request){
      $data = new Subject;
      return $data->subjectEdit($request->subject_id);
    }

    public function update(Request $request){      
      $this->validate($request,[
        'subj_code' => 'required',
        'subj_name' => 'required',
      ]);

      $data = new Subject();
      return $data->subjectUpdate($request->subject_id, $request->course_id, $request->year_level, $request->term_id, $request->subj_code, $request->subj_name);        
    }
}
