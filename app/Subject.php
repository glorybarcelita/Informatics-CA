<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  public function subjectStore($course_id, $year_level, $term_id, $subj_name){
    $subject= new IcaSubject();
    $subject->course_id = $course_id;
    $subject->year_level = $year_level;
    $subject->term_id = $term_id;
    $subject->subj_name = $subj_name;
    $subject->save();


    $dataSet = [];

    foreach ($courses as $course) {
      $dataSet[]=[
        'subject_id' => $subject->id, 
        'course_id' => $course,
      ];
    }

    DB::table('subject_create')->insert($dataSet);

    return 'success';
}

    








    // Subject::insert([
    //     [
    //       'course_id' => $course_id, 
    //       'year_level' => $year_level,
    //       'term_id' => $term_id,
    //       'subj_code' => $subj_code,
    //       'subj_name' => $subj_name,
    //     ]

    //     $dataSet = [];
    
    // foreach ($subjects as $subject) {
    //   $dataSet[]=[
    //     'subject_id' => $subj->id, 
    //     'course_id' => $course,
    //   ];
    // }

    // DB::table('subject_course')->insert($dataSet);

    // return 'success';







  public function subjectEdit($subject_id){
    $data = Subject::where('id', '=', $subject_id)
      ->first();

    return $data;
  }

  public function subjectUpdate($id, $course_id, $year_level, $term_id, $subj_name){
    $data = Subject::find($id);
    $data->course_id = $course_id;
    $data->year_level = $year_level;
    $data->term_id = $term_id;
    $data->subj_name = $subj_name;
    if($data->save()){
      return $success=['message'=>'Successfully updated a subject.'];
    }
  }
}
