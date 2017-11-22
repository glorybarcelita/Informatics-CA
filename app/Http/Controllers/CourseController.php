<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index(){
      $course = Course::get();

      return view('courses.index', ['courses'=>$course]);
    }

    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $data = new Course;
      return $data->courseStore($request->name, $request->description);
    }

    public function edit(Request $request){
      
      $data = new Course;
      return $data->courseEdit($request->id);
    }

    public function update(Request $request){
      $request->validate([
        'course_name' => 'required',
        'description' => 'required',
      ]);
      $data = new Course;
      return $data->courseUpdate($request->id, $request->status, $request->course_name, $request->description);
    }
}
