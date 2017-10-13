<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function courseStore($name, $description){
      $data = new Course();
      $data->course_name = $name;
      $data->overview = $description;
      if($data->save()){
        return $success=['message'=>'Successfully added a new course.'];
      }
    }

    public function courseEdit($id){
      return $data = Course::where('id', $id)
                          ->first();
    }

    public function courseUpdate($id, $status, $course_name, $description){
      $data = Course::find($id);
      $data->status = $status;
      $data->course_name = $course_name;
      $data->overview = $description;

      if($data->update()){
        return $success=['message'=>'Successfully updated the course details.'];
      }
    }
}
