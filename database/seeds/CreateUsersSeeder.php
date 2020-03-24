<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@boh.com.mm',
                'is_admin'=>'1',
               'password'=> bcrypt('BOHadmin'),
            ],

            [
               'name'=>'Gust',
               'email'=>'gust@boh.com.mm',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
