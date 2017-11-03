<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Subject;
use App\User;
use App\Course;
use App\IcaSubject;

class IcaSubjectController extends Controller
{
  public function index(){ 
    $subjects = Subject::get();
    $courses = Course::get();
    $lecturers = User::where('role_id', 2)
                ->get();

    return view('icaSubject.index', ['subjects'=>$subjects, 'courses'=>$courses, 'lecturers'=>$lecturers]);
  }

  public function select(){
    $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

    $data = IcaSubject::join('courses', 'ica_subjects.course_id', '=', 'courses.id')
                      ->join('users', 'ica_subjects.lecturer_id', '=', 'users.id')
                      ->select('ica_subjects.*', 'courses.course_name', $lecturer)
                      ->get();

    return $data;
  }

  public function store(Request $request){
    $request->validate([
        'ica_subj_name' => 'required',
        'course' => 'required',
        'subjects' => 'required',
        'overview' => 'required',
        'lecturer' => 'required'
      ]);

    $data = new IcaSubject();
    return $data->storeIcaSubject($request->ica_subj_name, $request->course, $request->subjects, $request->overview, $request->lecturer);
  }

  public function subjectsSelect(Request $request){
    $data = DB::table('ica_subject_subjs')
            ->join('subjects', 'ica_subject_subjs.subj_id', '=', 'subjects.id')
            ->select('ica_subject_subjs.*', 'subjects.subj_name')
            ->where('ica_subject_subjs.ica_subject_id', $request->ica_subj_id)
            ->get();

    return $data;
  }

  public function lecturerDashboard(){
    return view('lecturer.dashboard');
  }

  public function lecturerIcaSubjSelect(){
    $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

    $data = IcaSubject::join('courses', 'ica_subjects.course_id', '=', 'courses.id')
                      ->join('users', 'ica_subjects.lecturer_id', '=', 'users.id')
                      ->select('ica_subjects.*', 'courses.course_name', $lecturer)
                      ->where('lecturer_id', Auth::user()->id)
                      ->get();

    return $data;
  }
}
