<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $permissions = [
            ['name' => 'view user'],
            ['name' => 'add user'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],
            ['name' => 'view role'],
            ['name' => 'add role'],
            ['name' => 'edit role'],
            ['name' => 'delete role'],
        ];
        foreach($permissions as $item){
            Permission::create($item);
        }
        $role->syncPermissions(Permission::all());
        $user = User::first();
        $user->assignRole($role);

    }
}
