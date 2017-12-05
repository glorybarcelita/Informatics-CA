<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Subject;
use App\Course;
use App\Term;
use App\User;

class SubjectController extends Controller
{
    public function index(){ 
      $courses = Course::select('id', 'course_name')
      ->where('status', 'true')
      ->get();

      $subjects_list = Subject::select('id','subj_name')
                      ->groupBy('subj_name')
                      ->orderBy('subj_name')
                      ->get();

      $terms = Term::get();

      $lecturers = User::where('role_id', 2)
                  ->get();

      return view('subjects.index', ['courses'=>$courses, 'terms'=>$terms, 'subjects'=>$subjects_list, 'lecturers'=>$lecturers]);
    }

    public function select(){
      $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

      $subjects = Subject::join('courses', 'subjects.course_id', '=', 'courses.id')
      ->join('terms', 'subjects.term_id', '=', 'terms.id')
      ->leftJoin('users', 'subjects.user_id', '=', 'users.id')
      ->select('subjects.*', 'courses.course_name', 'terms.term_name', $lecturer)
      ->orderBy('terms.id', 'ASC')
      ->get();

      return $subjects;
    }

    public function store(Request $request){
      $this->validate($request,[
        'subj_name' => 'required',
      ]);

      // return $request->all();
      $data = new Subject();
      return $data->subjectStore($request->course_id, $request->year_level, $request->term_id, $request->subj_name);
    }

    public function edit(Request $request){
      $data = new Subject;
      return $data->subjectEdit($request->subject_id);
    }

    public function update(Request $request){      
      $this->validate($request,[
        'subj_name' => 'required',
      ]);

      $data = new Subject();
      return $data->subjectUpdate($request->subject_id, $request->course_id, $request->year_level, $request->term_id, $request->subj_name);        
    }

    public function delete(Request $request){
      $data = Subject::find($request->subject_id);
      $data->delete();

      return 'success';
    }

    public function subjByCourse(Request $request){
      $data = Subject::where('course_id', $request->course_id)
            ->get();

      return $data;
    }
}
