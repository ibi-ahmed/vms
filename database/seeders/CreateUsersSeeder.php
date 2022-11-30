<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'first_name'=>'Super',
               'last_name'=>'Super',
               'email'=>'super@super.vms',
               'type'=> 3,
               'password'=> bcrypt('123'),
            ],
            [
               'first_name'=>'Admin',
               'last_name'=>'Admin',
               'email'=>'admin@admin.vms',
               'type'=>2,
               'password'=> bcrypt('123'),
            ],
            [
                'first_name'=>'Staff',
                'last_name'=>'Staff',
                'email'=>'staff@staff.vms',
                'type'=>1,
                'password'=> bcrypt('123'),
             ],
            [
               'first_name'=>'User',
               'last_name'=>'User',
               'email'=>'user@user.vms',
               'type'=>0,
               'password'=> bcrypt('123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
