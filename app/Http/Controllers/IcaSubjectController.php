<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Subject;
use App\User;
use App\Course;
use App\IcaSubject;
use App\Syllabus;

class IcaSubjectController extends Controller
{
  public function index(){ 
    $subjects = Subject::get();
    $courses = Course::get();
    $lecturers = User::where('role_id', 2)
                ->get();

    return view('icaSubject.index', ['subjects'=>$subjects, 'courses'=>$courses, 'lecturers'=>$lecturers]);
  }

  public function select(){
    $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

    $data = IcaSubject::join('courses', 'ica_subjects.course_id', '=', 'courses.id')
                      ->join('users', 'ica_subjects.lecturer_id', '=', 'users.id')
                      ->select('ica_subjects.*', 'courses.course_name', $lecturer)
                      ->get();

    return $data;
  }

  public function store(Request $request){
    $request->validate([
        'ica_subj_name' => 'required',
        'course' => 'required',
        'subjects' => 'required',
        'overview' => 'required',
        'lecturer' => 'required'
      ]);

    $data = new IcaSubject();
    return $data->storeIcaSubject($request->ica_subj_name, $request->course, $request->subjects, $request->overview, $request->lecturer);
  }

  public function edit(Request $request){
    $icaSubjects = IcaSubject::where('id', $request->ica_subj_id)
                    ->get();

    $icaSubjSubjects = DB::table('ica_subject_subjs')
                        ->select('subj_id')
                        ->where('ica_subject_id', $request->ica_subj_id)
                        ->get();

    $data = [];
    foreach ($icaSubjects as $icaSubject) {
        $data = [
            'status'=>$icaSubject->status,
            'icasubj_name'=>$icaSubject->icasubj_name,
            'course_id'=>$icaSubject->course_id,
            'subjects'=>$icaSubjSubjects,
            'overview'=>$icaSubject->overview,
            'lecturer_id'=>$icaSubject->lecturer_id,
        ];
    }

    return $data;
  }

  public function update(Request $request){    
    $request->validate([
      'ica_subj_name' => 'required',
      'overview' => 'required',
    ]);

    $data = new IcaSubject();
    return $data->updateIcaSubject($request->id, $request->status, $request->ica_subj_name, $request->course, $request->subjects, $request->overview, $request->lecturer);    
  }

  public function subjectsSelect(Request $request){
    $data = DB::table('ica_subject_subjs')
            ->join('subjects', 'ica_subject_subjs.subj_id', '=', 'subjects.id')
            ->select('ica_subject_subjs.*', 'subjects.subj_name')
            ->where('ica_subject_subjs.ica_subject_id', $request->ica_subj_id)
            ->get();

    return $data;
  }

  public function lecturerDashboard(){    
    return view('lecturer.dashboard');
  }

  public function lecturerIcaSubjSelect(){
    $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

    $data = IcaSubject::join('courses', 'ica_subjects.course_id', '=', 'courses.id')
                      ->join('users', 'ica_subjects.lecturer_id', '=', 'users.id')
                      ->select('ica_subjects.*', 'courses.course_name', $lecturer)
                      ->where('lecturer_id', Auth::user()->id)
                      ->get();

    return $data;
  }

  public function lecturerIcaSubjectEdit($ica_subj_id){
    $lecturer = DB::raw("CONCAT(users.first_name,' ', users.last_name) as lecturer");

    $ica_subj = IcaSubject::join('courses', 'ica_subjects.course_id', '=', 'courses.id')
                      ->join('users', 'ica_subjects.lecturer_id', '=', 'users.id')
                      ->select('ica_subjects.*', 'courses.course_name', $lecturer)
                      ->where('ica_subjects.id', $ica_subj_id)
                      ->first();

    $ica_subj_subjs = DB::table('ica_subject_subjs')
                    ->select('subj_id')
                    ->where('ica_subject_id', $ica_subj_id)
                    ->get();

    $subj_name = [];
    foreach ($ica_subj_subjs as $ica_subj_subj) {
      $codes = Subject::select('subj_name')
              ->where('id', $ica_subj_subj->subj_id)
              ->first();

      $subj_name[] = [
        'subj_name'=>$codes->subj_name
      ];
    }

    foreach ($subj_name as $subj_name) {
      $syllabus = Syllabus::select('id', 'subj_name', 'topics')
              ->where('subj_name', '=', $subj_name['subj_name'])
              ->get();

      foreach ($syllabus as $sylla) {
        $topics[] = [
          'id'=>$sylla->id,
          'topics'=>$sylla->topics,
          'subj_name'=>$sylla->subj_name,
        ];
      }
    }

    $ica_topics = DB::table('ica_subjects_topics')->get();

    return view('icaSubject.update', ['ica_subject'=>$ica_subj, 'topics'=>$topics, 'ica_topics'=>$ica_topics]);
  }

  public function lecturerIcaSubjectTopicStore(Request $request){
    $ica_subjects_topics_id = DB::table('ica_subjects_topics')->insertGetId(
            [
              'ica_subj_id' => $request->ica_subj_id,
              'topic_title' => $request->topic_title,
              'note'=> $request->note
            ]
          );

    $tagged_syllabus = [];

    foreach ($request->ica_topic_syllabus as $syllabus) {
      $tagged_syllabus[]=[
        'ica_subjects_topics'=>$ica_subjects_topics_id,
        'syllabus_id'=>$syllabus
      ];
    }

    $data = DB::table('ica_subjects_topics_syllabi')->insert($tagged_syllabus);

    $links = [];

    foreach ($request->links as $link) {
      $links[]=[
        'ica_subj_topic_id'=>$ica_subjects_topics_id,
        'link'=>$link
      ];
    }

    $link_vids = DB::table('ica_subjects_topic_videos')->insert($links);
    /* upload files */
  }

  public function lecturerIcaSubjectTopicSelect(Request $request){
    $data = DB::table('ica_subjects_topics_syllabi')->join('syllabi', 'ica_subjects_topics_syllabi.syllabus_id', '=', 'syllabi.id')
            ->select('ica_subjects_topics_syllabi.*', 'syllabi.subj_name', 'syllabi.topics')
            ->where('ica_subjects_topics', $request->ica_subj_id)
            ->get();

    return $data;
  }

  public function delete(Request $request){
    $data = IcaSubject::find($request->id);
    $data->delete();

    return "success";
  }

  public function icasubjTopic($topic_id){
    $data = DB::table('ica_subjects_topics')
            ->select('id', 'ica_subj_id', 'topic_title', 'note')
            ->where('id', $topic_id)
            ->first();

    $syllabi = DB::table('ica_subjects_topics_syllabi')
              ->join('syllabi', 'ica_subjects_topics_syllabi.syllabus_id', 'syllabi.id')
              ->select('syllabi.topics')
              ->where('ica_subjects_topics_syllabi.ica_subjects_topics', $topic_id)
              ->get();

    $links = DB::table('ica_subjects_topic_videos')
            ->select('id', 'link')
            ->where('ica_subj_topic_id', $topic_id)
            ->get();

    $syllabus = DB::table('syllabi')
                ->get();

    return view('icaSubject.topics.index', ['topic'=>$data, 'syllabi'=>$syllabi, 'links'=>$links, 'topics'=>$syllabus]);
  }

  public function studentDashboard(){    
    return view('student.index');
  }

  public function deleteVideo(Request $request){
    $data = DB::table('ica_subjects_topic_videos')
            ->where('id', $request->video_id)
            ->delete();

    return 'success';
  }

  public function editLecturerIcaTopic(Request $request){
    $data = DB::table('ica_subjects_topics')
            ->where('id', $request->ica_topic_id)
            ->first();

    $icaTopicSyllabi = DB::table('ica_subjects_topics_syllabi')
                      ->join('syllabi', 'ica_subjects_topics_syllabi.syllabus_id', '=', 'syllabi.id')
                      ->select('syllabi.*')
                      ->where('ica_subjects_topics_syllabi.ica_subjects_topics', $request->ica_topic_id)
                      ->get();
    return ['icasubj_topic'=>$data, 'icasubj_topic_syllabi'=>$icaTopicSyllabi];
  }

  public function updateLecturerIcaTopic(Request $request){
    $i = 0;
    foreach ($request->syllabi as $syllabus) {
      $data = DB::table('ica_subjects_topics_syllabi')
              ->select('syllabus_id')
              ->where('ica_subjects_topics', $request->ica_topic_id)
              ->get();
      
      if(!$data[$i]->syllabus_id == $syllabus){
        $syllabusDate = DB::table('ica_subjects_topics_syllabi')
                        ->insert([
                          'ica_subjects_topics'=>$request->ica_topic_id,
                          'syllabus_id'=>$syllabus
                        ]);

        // return 'not matched';
      }
      $i++;
    }

    $updateTopic = DB::table('ica_subjects_topics')
                    ->where('id', $request->ica_topic_id)
                    ->update([
                      'topic_title'=>$request->topic_tite,
                      'note'=>$request->note
                    ]);

    return 'success';
  }
}