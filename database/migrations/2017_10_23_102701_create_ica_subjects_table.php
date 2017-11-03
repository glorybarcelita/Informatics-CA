<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcaSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ica_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->default('pending'); //request/pending, approved/active, inactive (disabled by the registrar)
            $table->string('icasubj_name');
            $table->integer('course_id');
            $table->longtext('overview')->nullable();
            $table->integer('lecturer_id');
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
        Schema::dropIfExists('ica_subjects');
    }
}
