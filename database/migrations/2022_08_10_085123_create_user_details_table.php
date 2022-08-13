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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('headline')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('gender');
            $table->string('employment')->nullable();
            $table->string('income_range')->nullable();
            $table->string('employment_group')->nullable();
            $table->string('hear_about_us');
            $table->string('friends')->nullable();
            $table->string('education_level')->nullable();
            $table->string('location')->nullable();



            $table->string('dob')->nullable();
            $table->string('astrology')->nullable();
            $table->string('relationship')->nullable();
            $table->string('children')->nullable();
            $table->string('smoke')->nullable();
            $table->string('pets')->nullable();
            $table->string('drink')->nullable();



            $table->string('job_title')->nullable();
            $table->string('why_you_are_on_gfv')->nullable();
            $table->string('personality_type')->nullable();
            $table->string('communication_style')->nullable();
            $table->string('contact_by_people_from')->nullable();
            $table->string('availability')->nullable();


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
        Schema::dropIfExists('user_details');
    }
};
