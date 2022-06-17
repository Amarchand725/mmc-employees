<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendedFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extended_families', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->boolean('father')->default(1);
            $table->boolean('mother')->default(1);
            $table->boolean('brother');
            $table->boolean('sister');
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
        Schema::dropIfExists('extended_families');
    }
}
