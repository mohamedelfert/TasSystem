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
            , '10:30:00' => '12:00:00'
            , '12:00:00' => '13:30:00'
            , '13:30:00' => '15:00:00'
            , '15:00:00' => '16:30:00'
            , '16:30:00' => '18:00:00'
            , '18:00:00' => '19:30:00'
            , '19:30:00' => '21:00:00'
            , '21:00:00' => '22:30:00'
            , '22:30:00' => '24:00:00'
        ];
        foreach ($slots as $key => $value) {
            Slot::insert(['start_at' => $key, 'end_at' => $value]);
        }
    }
}
