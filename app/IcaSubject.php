<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IcaSubject extends Model
{
  public function storeIcaSubject($icasubj_name, $course, $subjects, $overview, $lecturer){
    $ica_subj = new IcaSubject();
    $ica_subj->icasubj_name = $icasubj_name;
    $ica_subj->course_id = $course;
    $ica_subj->overview = $overview;
    $ica_subj->lecturer_id = $lecturer;
    $ica_subj->save();

    $dataSet = [];
    
    foreach ($subjects as $subject) {
      $dataSet[]=[
        'ica_subject_id' => $ica_subj->id, 
        'subj_id' => $subject,
      ];
    }

    DB::table('ica_subject_subjs')->insert($dataSet);

    return 'success';
  }
}
