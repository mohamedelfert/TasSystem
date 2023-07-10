<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'mohamed',
            'first_name' => 'mohamed',
            'last_name' => 'ibrahiem',
            'email' => 'mohamed_ibrahiem@app.com',
            'password' => bcrypt('123456'),
            'role_name'  => 'super_admin',
            'status'     => 'active',
        ]);
    }
}
