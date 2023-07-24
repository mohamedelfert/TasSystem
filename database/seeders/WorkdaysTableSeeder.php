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
        $workdays = [
            'saturday' => 'السبت',
            'sunday' => 'الاحد',
            'monday' => 'الاثنين',
            'tuesday' => 'الثلاثاء',
            'wednesday' => 'الاربعاء',
            'thursday' => 'الخميس',
            'friday' => 'الجمعه'
        ];
        foreach ($workdays as $key => $value) {
            Workday::insert([
                'day' => json_encode(['en' => $key, 'ar' => $value])
            ]);
        }
    }
}
