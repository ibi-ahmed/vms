<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'ACE Office'],
            ['name' => 'HPPITI'],
            ['name' => 'CS&A'],
            ['name' => 'F&A'],
            ['name' => 'IT'],
            ['name' => 'HSEC'],
            ['name' => 'ERSP'],
            ['name' => 'MGDIF'],
            ['name' => 'Audit'],
            ['name' => 'Procurement'],
            ['name' => 'Legal'],
            ['name' => 'S&I'],
        ];

        foreach ($departments as $key => $department) {
            Department::create($department);
        } 
    }
}
