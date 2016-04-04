<?php

use Illuminate\Database\Seeder;

class UserInputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 30 random user inputs from the ModelFactory
        factory(App\UserInput::class, 30)->create();
    }
}
