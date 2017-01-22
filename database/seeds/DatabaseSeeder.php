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
        // Model::unguard();
        Eloquent::unguard();

        $this->call('OrderSeeder');
        $this->call('UserSeeder');
        $this->call('AdminSeeder');
        $this->call('DriverSeeder');

        // Model::reguard();
    }
}
