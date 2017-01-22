<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //memanggil data fake untuk membuat fake data
        $faker = Faker\Factory::create();

        //perulangan untuk menambah data sebanyak 5
        foreach (range(1,5) as $i) {

        	$website = $faker->domainName; //membuat fake data dengan domainName

        	//memasukkan data pada database
        	Admin::create([
        		'nama_lengkap' 		=>$faker->userName,
        		// 'email'				=>$faker->userName. '@' .$website,
        		'username'			=>$faker->userName,
        		'password'			=> Hash::make('123456'),
        		'jkel'				=>'laki-laki',
        		'telpon'			=>'1234567890'
        	]);

        }
    }
}
