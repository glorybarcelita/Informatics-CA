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
        return back()->with('message', 'Successfully added a new course.');
      }
    }

    public function courseEdit($id){
      return $data = Course::where('id', $id)
                          ->first();
    }
}
