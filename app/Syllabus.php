<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
  public function storeSyllabus($subj_code, $topics){
    $dataSet = [];
    
    foreach ($topics as $topic) {
      $dataSet[]=[
        'subj_code'=>$subj_code,
        'topics'=>ucwords(strtolower($topic))
      ];
    }

    if(Syllabus::insert($dataSet)){
      $syllabi = Syllabus::where('subj_code', $subj_code)
      ->get();

      return $success=['message'=>'Successfully updated a subject.', 'syllabi'=>$syllabi];
    }
  }

  public function editSyllabus($id){
    $data = Syllabus::where('id', '=', $id)
            ->first();

    return $data;  
  }

  public function updateSyllabus($id, $subj_code, $topic){
    $data = Syllabus::find($id);
    $data->subj_code = $subj_code;
    $data->topics = $topic;

    if($data->update()){
      $syllabi = Syllabus::where('subj_code', $subj_code)
      ->get();

      return $success=['message'=>'Successfully updated a subject.', 'syllabi'=>$syllabi];
    }
  }

  public function destroyTopic($id){
    $subj_code = Syllabus::select('subj_code')
                ->where('id', $id)
                ->first();

    $data = Syllabus::find($id);

    if($data->delete()){
      $syllabi = Syllabus::where('subj_code', $subj_code->subj_code)
                 ->get();

      return $success=['message'=>'Successfully deleted a subject.', 'syllabi'=>$syllabi];      
    }
  }
}
