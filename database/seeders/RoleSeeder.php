<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Contractor'],
            ['name' => 'Security'],
            ['name' => 'Staff'],
            ['name' => 'Admin'],
            ['name' => 'Super'],
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
