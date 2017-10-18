<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Subject extends Model
{
    public function subjectStore($course_id, $year_level, $term_id, $subj_code, $subj_name){
      $data = new Subject;
      $data->course_id = $course_id;
      $data->year_level = $year_level;
      $data->term_id = $term_id;
      $data->subj_code = $subj_code;
      $data->subj_name = $subj_name;
      if($data->save()){
        return $success=['message'=>'Successfully added a subject.'];
      }
    }
}
