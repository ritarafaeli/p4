<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTables extends Migration{
    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('last_login')->default(Carbon\Carbon::now()->toDateTimeString());
        });
        Schema::table('caregivers', function (Blueprint $table) {
            $table->integer('years_experience')->unsigned()->default(0);
            $table->integer('age')->unsigned()->nullable();
            $table->integer('max_children')->unsigned()->default(1);
            $table->boolean('is_experienced_infants')->default(false);
            $table->boolean('is_experienced_toddlers')->default(false);
            $table->boolean('is_experienced_preschoolers')->default(false);
            $table->boolean('is_experienced_specialneeds')->default(false);
        });
    }
    public function down(){
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_login');
        });
        Schema::table('caregivers', function (Blueprint $table) {
            $table->dropColumn('years_experience');
            $table->dropColumn('age');
            $table->dropColumn('max_children');
            $table->dropColumn('is_experienced_infants');
            $table->dropColumn('is_experienced_toddlers');
            $table->dropColumn('is_experienced_preschoolers');
            $table->dropColumn('is_experienced_specialneeds');
        });
    }
}
