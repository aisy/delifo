<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $faker = Faker\Factory::create();
        Eloquent::unguard();
        foreach (range(1,5) as $i) {
        	$website = $faker->domainName;
        	User::create([
        		'name' 		=>"user".$i,
                'username'  =>$faker->Name,
        		'email'		=>$faker->userName. '@' .$website,
                'telpon'    =>'1234567890',
        		'password'	=>'123456',
                'alamat'    =>'malang'
        	]);
        }

    }
}
