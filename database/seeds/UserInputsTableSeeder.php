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
        //Hourly Rates
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => '$5-$10',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => '$10-$15',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => '$15-$20',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => '$20-$25',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => '$25+',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'HourlyRate',
            'subcategory' => 'Flexible',
        ]);


        //Education Level
        DB::table('user_inputs')->insert([
            'category' => 'Education',
            'subcategory' => 'High School',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Education',
            'subcategory' => 'Some College',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Education',
            'subcategory' => 'Bachelor\'s Degree',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Education',
            'subcategory' => 'Master\'s Degree',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Education',
            'subcategory' => 'Doctorate Degree',
        ]);

        //Languages
        DB::table('user_inputs')->insert([
            'category' => 'Language',
            'subcategory' => 'English',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Language',
            'subcategory' => 'Spanish',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Language',
            'subcategory' => 'Chinese',
        ]);
        DB::table('user_inputs')->insert([
            'category' => 'Language',
            'subcategory' => 'Russian',
        ]);

    }
}
