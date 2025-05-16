<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Seeding Order:
     * 1. Roles - Creates admin and student roles
     * 2. Admin User - Creates default administrator
     * 3. Courses - Seeds initial course data
     * 
     * Extension Points:
     * - Add more user types by extending Role seeder
     * - Add student seeding after admin creation
     * - Customize course data in CourseSeeder
     *
     * @return void
     */
    public function run()
    {
        // Step 1: Create roles (admin and student)
        $this->call(RoleSeeder::class);

        // Step 2: Create default admin user with credentials:
        // Email: admin@admin.com
        // Password: password123 (hashed by User model mutator)
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => 'password123'  // Automatically hashed by User model mutator
        ]);

        // Assign admin role to the administrator
        $adminRole = Role::where('slug', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Step 3: Seed course data
        // You can modify CourseSeeder.php to customize course information
        $this->call(CourseSeeder::class);

        // TODO: Add student seeding here if needed
        // Example: Factory::times(10)->create() for generating test students
    }
}
