<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender', 6);
            $table->string('student_id', 9)->unique();
            $table->date("dob");
            $table->string("phone", 10)->nullable();
            $table->string("address", 100);
            $table->string("avatar")->nullable();
            $table->smallInteger("course_id");
            $table->smallInteger("batch_id");
            $table->date('registration_date');
            $table->date('course_start_date');
            $table->date('course_end_date');
            $table->boolean("status");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
