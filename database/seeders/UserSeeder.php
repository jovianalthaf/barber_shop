<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $customerRole = Role::firstOrCreate(['name' => 'Customer']);
        $capsterRole = Role::firstOrCreate(['name' => 'Capster']);

        // Admin User
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('123456'),
            ]);
            $admin->assignRole($adminRole);
        }

        // Customer User
        $customer = User::where('email', 'customer@example.com')->first();
        if (!$customer) {
            $customer = User::create([
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => Hash::make('123456'),
            ]);
            $customer->assignRole($customerRole);
        }

        // Capster User
        $capster = User::where('email', 'capster@example.com')->first();
        if (!$capster) {
            $capster = User::create([
                'name' => 'Capster User',
                'email' => 'capster@example.com',
                'password' => Hash::make('123456'),
            ]);
            $capster->assignRole($capsterRole);
        }
    }
}
