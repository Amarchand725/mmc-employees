<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('course');
            $table->string('year');
            $table->string('name_of_institute');
            $table->string('course_period');
            $table->string('grade_or_percentage');
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
        Schema::dropIfExists('other_qualifications');
    }
}
