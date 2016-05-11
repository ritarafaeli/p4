<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaregiverAddHourlyRate extends Migration
{
    public function up()
    {
        Schema::table('caregivers', function($table)
        {
            $table->integer('hourly_rate_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::table('caregivers', function($table)
        {
            $table->dropForeign('hourly_rate_id');
        });
    }
}
