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
            '09:00:00' => '10:00:00'
            , '10:00:00' => '11:00:00'
            , '11:00:00' => '12:00:00'
            , '12:00:00' => '13:00:00'
            , '13:00:00' => '14:00:00'
            , '14:00:00' => '15:00:00'
            , '15:00:00' => '16:00:00'
            , '16:00:00' => '17:00:00'
            , '17:00:00' => '18:00:00'
            , '18:00:00' => '19:00:00'
            , '19:00:00' => '20:00:00'
            , '20:00:00' => '21:00:00'
            , '21:00:00' => '22:00:00'
        ];
        foreach ($slots as $key => $value) {
            Slot::insert(['start_at' => $key, 'end_at' => $value]);
        }
    }
}
