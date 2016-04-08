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
        //create 2 users from project instructions
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jill',
            'email' => 'jill@harvard.edu',
            'password' => bcrypt('helloworld'),
            'is_parent' => false, //Caregiver Account
        ]);
        DB::table('caregivers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 1,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jamal',
            'email' => 'jamal@harvard.edu',
            'password' => bcrypt('helloworld'),
            'is_parent' => true, //Parent/Guardian Account
        ]);
        DB::table('guardians')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 2,
        ]);

        //create my own personal test users
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Rita Rafaeli Caregiver',
            'email' => 'milyazar@gmail.com',
            'password' => bcrypt('secret'),
            'is_parent' => false,
        ]);
        DB::table('caregivers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 3,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Rita Rafaeli Parent',
            'email' => 'milyazar+1@gmail.com',
            'password' => bcrypt('secret'),
            'is_parent' => true,
        ]);
        DB::table('guardians')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 4,
        ]);
    }
}
