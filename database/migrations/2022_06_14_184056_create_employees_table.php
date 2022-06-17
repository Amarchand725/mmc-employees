<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->boolean('form_status')->default(0);
            $table->string('full_name');
            $table->string('father_name');
            $table->date('dob');
            $table->string('place_of_birth');
            $table->string('cnic');
            $table->date('cnic_expiry');
            $table->string('blood_group');
            $table->string('Religion');
            $table->boolean('marital_status')->default(0);
            $table->boolean('status')->default(1);
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
