<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Syllabus;

class SyllabusController extends Controller
{
    public function select(Request $request){
      $data = Syllabus::where('subj_code', '=', $request->subj_code)
      ->get();
      return $data;
    }

    public function store(Request $request){
      $data = new Syllabus();
      return $data->storeSyllabus($request->subj_code, $request->topics);
    }

    public function edit(Request $request){
      $data = new Syllabus();
      return $data->editSyllabus($request->topic_id);
    }

    public function update(Request $request){
      $request->validate([
        'subj_code' => 'required',
        'topic' => 'required',
      ]);
      $data = new Syllabus();
      return $data->updateSyllabus($request->id, $request->subj_code, $request->topic);
    }

    public function destroy(Request $request){
      $data = new Syllabus();
      return $data->destroyTopic($request->topic_id);
    }
}
