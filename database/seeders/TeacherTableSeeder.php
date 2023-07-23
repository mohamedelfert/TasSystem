<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'first_name' => 'ahmed',
            'last_name' => 'ali',
            'email' => 'ahmed_ali@yahoo.com',
            'password' => bcrypt('123456789'),
            'phone' => '01121548710',
            'address' => 'cairo',
            'status' => 'inactive',
            'work' => 'no',
        ]);
    }
}
