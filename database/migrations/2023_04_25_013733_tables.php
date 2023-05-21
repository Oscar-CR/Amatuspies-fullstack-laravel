<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointment', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('motive')->nullable();
            $table->string('more_details')->nullable();
            $table->timestamps();
        });

        Schema::create('medical_date', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('motive_date')->nullable();
            $table->string('treatment_type')->nullable();
            $table->string('more_details')->nullable();
            $table->dateTime('date')->nullable();
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
        Schema::dropIfExists('medical_appointment');
        Schema::dropIfExists('medical_date');
    }
};
