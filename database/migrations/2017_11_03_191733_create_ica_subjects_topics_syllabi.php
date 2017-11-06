<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcaSubjectsTopicsSyllabi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ica_subjects_topics_syllabi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ica_subjects_topics');
            $table->integer('syllabus_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ica_subjects_topics_syllabi');
    }
}
