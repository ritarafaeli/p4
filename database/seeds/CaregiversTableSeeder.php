<?php

use Illuminate\Database\Seeder;

class CaregiversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create 30 random caregivers from the ModelFactory
        factory(App\Caregiver::class, 30)->create();
    }
}
