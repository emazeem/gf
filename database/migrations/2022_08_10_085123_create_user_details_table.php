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
            $table->string('gender')->nullable();
            $table->string('employment')->nullable();
            $table->string('income_range')->nullable();
            $table->string('employment_group')->nullable();
            $table->string('hear_about_us')->nullable();
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
            $table->longText('availability')->nullable();
            $table->longText('hobbies')->nullable();
            $table->longText('sports')->nullable();
            $table->longText('fitness')->nullable();
            $table->longText('entertainment')->nullable();
            $table->longText('music')->nullable();
            $table->longText('movies')->nullable();
            $table->longText('books')->nullable();
            $table->longText('fav_tv_shows')->nullable();
            $table->longText('fav_movies')->nullable();
            $table->longText('fav_hobbies')->nullable();
            $table->longText('fav_teams')->nullable();
            $table->longText('fav_bands')->nullable();
            $table->longText('fav_books')->nullable();
            $table->string('profile')->nullable();
            $table->string('cover')->nullable();
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
