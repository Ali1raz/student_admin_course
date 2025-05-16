<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'admin'
            ],
            [
                'name' => 'Student',
                'slug' => 'student'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
