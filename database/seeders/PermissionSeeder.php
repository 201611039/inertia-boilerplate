<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-view', 'user-edit', 'user-update', 'user-delete',
            'role-view', 'role-edit', 'role-update', 'role-delete', 'role-grant-permission',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }
    }
}
