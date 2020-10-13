<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.test',
            'password' => \bcrypt('admin'),
            'email_verified_at' => now()
        ]);

        $role = Role::create(['name' => 'super-admin']);

        $admin->assignRole('super-admin');

        event(new Registered($admin));

    }
}
