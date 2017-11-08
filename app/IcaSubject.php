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

  public function updateIcaSubject($id, $status, $icasubj_name, $course, $subjects, $overview, $lecturer){
    $ica_subj = IcaSubject::find($id);
    $ica_subj->status = $status;
    $ica_subj->icasubj_name = $icasubj_name;
    $ica_subj->course_id = $course;
    $ica_subj->overview = $overview;
    $ica_subj->lecturer_id = $lecturer;
    $ica_subj->update();

    $dataSet = [];
    
    foreach ($subjects as $subject) {
      $response = $this->ifExistIcaSubjSubjs($id, $subject);

      if($response==false){
        $dataSet[]=[
          'ica_subject_id' => $id, 
          'subj_id' => $subject,
        ];
      }
    }

    DB::table('ica_subject_subjs')->insert($dataSet);
    
    return 'Success';
  }

  function ifExistIcaSubjSubjs($ica_subj_id, $subj_id){
    $data = DB::table('ica_subject_subjs')
            ->where('ica_subject_id', $ica_subj_id)
            ->where('subj_id', $subj_id)
            ->count();

    if($data==0){
      return false;
    }else{
      return true;
    }
  }
}
