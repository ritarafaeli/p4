<?php

use Illuminate\Database\Seeder;

class GuardiansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 30 random guardians from the ModelFactory
        factory(App\Guardian::class, 30)->create();
    }
}
