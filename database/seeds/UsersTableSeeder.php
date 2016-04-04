<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 30 random users from the ModelFactory
        factory(App\User::class, 30)->create();
    }
}
