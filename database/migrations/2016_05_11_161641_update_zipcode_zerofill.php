<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateZipcodeZerofill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE jobs CHANGE zip_code zip_code INT(5) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE caregivers CHANGE zip_code zip_code INT(5) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE jobs CHANGE zip_code zip_code INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE caregivers CHANGE zip_code zip_code INT UNSIGNED NOT NULL');
    }
}
