<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);

        $admin->assignRole('super-admin');

        $admin->profile()->create();

        event(new Registered($admin));
    }
}
