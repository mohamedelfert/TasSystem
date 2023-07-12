<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'mohamed',
            'first_name' => 'mohamed',
            'last_name' => 'ibrahiem',
            'email' => 'mohamed_ibrahiem@app.com',
            'password' => bcrypt('123456'),
            'role_name'  => 'super_admin',
            'status'     => 'active',
        ]);

        $role = Role::create(['name' => 'super_admin','display_name' => 'المدير العام']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
