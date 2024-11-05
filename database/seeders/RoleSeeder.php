<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['id' => 1, 'role_name' => 'Admin'],
            ['id' => 2, 'role_name' => 'Teacher'],
            ['id' => 3, 'role_name' => 'Student'],
        ];

        foreach ($roles as $role) {
            Role::updateOrInsert(['id' => $role['id']], $role);
        }
        
    }
}
