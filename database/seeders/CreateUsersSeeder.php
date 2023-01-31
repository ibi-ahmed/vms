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
               'name'=>'Super',
            //    'last_name'=>'Super',
               'email'=>'super@super.vms',
               'role_id'=> 5,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'Admin',
            //    'last_name'=>'Admin',
               'email'=>'admin@admin.vms',
               'role_id'=>4,
               'password'=> bcrypt('123'),
            ],
            [
                'name'=>'Staff',
                // 'last_name'=>'Staff',
                'email'=>'staff@staff.vms',
                'role_id'=>3,
                'password'=> bcrypt('123'),
             ],
            [
               'name'=>'Security',
            //    'last_name'=>'Security',
               'email'=>'security@security.vms',
               'role_id'=>2,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'Contractor',
            //    'last_name'=>'Contractor',
               'email'=>'contractor@contractor.vms',
               'role_id'=>1,
               'password'=> bcrypt('123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
