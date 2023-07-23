<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slots = [
            '09:00:00' => '10:30:00'
            , '10:30:00' => '11:30:00'
            , '11:30:00' => '12:30:00'
            , '12:30:00' => '13:30:00'
            , '13:30:00' => '14:30:00'
            , '14:30:00' => '16:00:00'
            , '16:00:00' => '17:30:00'
        ];
        foreach ($slots as $key => $value) {
            Slot::insert(['start_at' => $key, 'end_at' => $value]);
        }
    }
}
