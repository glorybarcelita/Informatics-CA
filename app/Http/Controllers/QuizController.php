<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index($topic_id){
      $topic = DB::table('ica_subjects_topics')
            ->select('id', 'topic_title')
            ->where('id', $topic_id)
            ->first();

      return view('icaSubject.quiz.index', ['topic'=>$topic]);
    }

    public function selectQuiz($topic_id){
      $data = DB::table('quiz')
              ->join('quiz_question', 'quiz.quiz_question_id', '=', 'quiz_question.id')
              ->select('quiz.*', 'quiz_question.question')
              ->where('quiz.ica_topic_id', $topic_id)
              ->get();
      return $data;
    }
}
