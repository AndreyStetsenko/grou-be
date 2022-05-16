<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'login' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Manager',
            'login' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('Manager');

        $user = User::create([
            'name' => 'Creator',
            'login' => 'Creator',
            'email' => 'creator@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('Creator');
    }
}
