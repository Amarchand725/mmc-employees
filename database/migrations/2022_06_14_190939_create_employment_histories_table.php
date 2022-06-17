<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('name_of_employer');
            $table->text('address');
            $table->string('contact_person')->nullable();
            $table->string('contact_no')->nullable();
            $table->date('employee_from')->nullable();
            $table->date('employee_to')->nullable();
            $table->string('last_designation')->nullable();
            $table->text('reason_for_leaving')->nullable();
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
        Schema::dropIfExists('employment_histories');
    }
}
