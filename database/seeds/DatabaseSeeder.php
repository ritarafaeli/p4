<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(UserInputsTableSeeder::class);
        $this->call(CaregiversTableSeeder::class);
        //$this->call(GuardiansTableSeeder::class);
        $this->call(JobsTableSeeder::class);

        Model::reguard();
    }
}
