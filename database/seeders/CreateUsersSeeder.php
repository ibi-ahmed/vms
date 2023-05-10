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
               'name'=>'Super Admin',
            //    'last_name'=>'Super',
               'email'=>'isahmed@protonmail.com',
               'role_id'=> 5,
               'password'=> bcrypt('123'),
            ],
            // [
            //    'name'=>'Mista Mann',
            // //    'last_name'=>'Admin',
            //    'email'=>'admin@admin.vms',
            //    'role_id'=>4,
            //    'password'=> bcrypt('123'),
            // ],
            // [
            //     'name'=>'Thomas Sankara',
            //     // 'last_name'=>'Staff',
            //     'email'=>'staff@staff.vms',
            //     'role_id'=>3,
            //     'password'=> bcrypt('123'),
            //  ],
            // [
            //    'name'=>'Gamal Abdel Nasser',
            // //    'last_name'=>'Security',
            //    'email'=>'security@security.vms',
            //    'role_id'=>2,
            //    'password'=> bcrypt('123'),
            // ],
            // [
            //    'name'=>'Musa Mansa',
            // //    'last_name'=>'Contractor',
            //    'email'=>'contractor@contractor.vms',
            //    'role_id'=>1,
            //    'password'=> bcrypt('123'),
            // ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
