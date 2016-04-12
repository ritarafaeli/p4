<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTables extends Migration
{
    public function up(){
        Schema::rename('languages_jobs', 'language_jobs');
        Schema::rename('languages_caregivers', 'language_caregivers');
    }

    public function down(){
        Schema::rename('language_jobs', 'languages_jobs');
        Schema::rename('language_caregivers', 'languages_caregivers');
    }
}
