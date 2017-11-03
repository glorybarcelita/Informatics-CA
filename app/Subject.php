<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  public function subjectStore($course_id, $year_level, $term_id, $subj_code, $subj_name){
    Subject::insert([
        [
          'course_id' => $course_id, 
          'year_level' => $year_level,
          'term_id' => $term_id,
          'subj_code' => $subj_code,
          'subj_name' => $subj_name,
        ]
    ]);

    return $success=['message'=>'Successfully added a subject.'];
  }

  public function subjectEdit($subject_id){
    $data = Subject::where('id', '=', $subject_id)
      ->first();

    return $data;
  }

  public function subjectUpdate($id, $course_id, $year_level, $term_id, $subj_code, $subj_name){
    $data = Subject::find($id);
    $data->course_id = $course_id;
    $data->year_level = $year_level;
    $data->term_id = $term_id;
    $data->subj_code = $subj_code;
    $data->subj_name = $subj_name;
    if($data->save()){
      return $success=['message'=>'Successfully updated a subject.'];
    }
  }
}
