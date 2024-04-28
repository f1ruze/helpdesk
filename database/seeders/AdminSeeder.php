<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
            $admin =   Admin::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'password',
                'role_id' => 1
            ]);

            $admin->assignRole(1);

            $dev =  Admin::create([
                'name' => 'Developer',
                'email' => 'dev@dev.com',
                'password' => 'password',
                'role_id' => 2
            ]);

            $dev->assignRole(2);

//    ----------------
        $admin =   Admin::create([
            'name' => 'Teacher',
            'email' => 'user@teacher.com',
            'password' => 'password',
            'role_id' => 3
        ]);

        $admin->assignRole(3);

        $admin =   Admin::create([
            'name' => 'Student',
            'email' => 'user@student.com',
            'password' => 'password',
            'role_id' => 3
        ]);

        $admin->assignRole(3);
    }
}
