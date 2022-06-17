<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residential_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->string('type')->comment('current or permanent');
            $table->string('living_since')->comment('year');
            $table->string('nearest_landmark')->nullable();
            $table->string('peroperty_type')->nullable()->comment('own, rental or other');
            $table->text('describe_other')->nullable()->comment('describe if other');
            $table->text('complete_address');
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
        Schema::dropIfExists('residential_addresses');
    }
}
