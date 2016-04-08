<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_parent');
            $table->string('profile_picture'); //will implement later
        });

        Schema::create('user_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('subcategory');
            $table->string('description')->nullable();
        });

        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('caregivers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('bio')->nullable();
            $table->integer('zip_code')->nullable();
            $table->boolean('is_smoker')->default(false);
            $table->boolean('is_driver')->default(false);
            $table->boolean('is_cpr_certified')->default(false);
            $table->integer('education_level_id')->unsigned()->nullable();;
            $table->foreign('education_level_id')->references('id')->on('user_inputs')->nullable();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('parents');
            $table->text('title');
            $table->longText('description');
            $table->integer('zip_code');
            $table->integer('num_children');
            $table->integer('hourly_rate_id')->unsigned();
            $table->foreign('hourly_rate_id')->references('id')->on('user_inputs');
            $table->integer('education_level_id')->unsigned()->nullable();;
            $table->foreign('education_level_id')->references('id')->on('user_inputs')->nullable();
            $table->boolean('is_smoker')->default(false);
            $table->boolean('is_driver')->default(false);
            $table->boolean('is_cpr_certified')->default(false);
        });

        Schema::create('languages_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('user_inputs');
        });

        Schema::create('languages_caregivers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('caregiver_id')->unsigned();
            $table->foreign('caregiver_id')->references('id')->on('caregivers');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('user_inputs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('languages_caregivers');
        Schema::drop('languages_jobs');
        Schema::drop('jobs');
        Schema::drop('caregivers');
        Schema::drop('parents');
        Schema::drop('user_inputs');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_parent');
            $table->dropColumn('profile_picture');
        });
    }
}
