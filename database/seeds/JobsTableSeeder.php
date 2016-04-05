<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 30 random jobs from the ModelFactory
        factory(App\Job::class, 30)->create();
    }
}
