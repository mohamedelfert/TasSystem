<?php

namespace Database\Seeders;

use App\Models\Workday;
use Illuminate\Database\Seeder;

class WorkdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workdays = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        foreach ($workdays as $workday) {
            Workday::insert(['day' => $workday]);
        }
    }
}
