<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $data['site_name_ar'] = 'نظام Tas لاداره المعلمين';
        $data['site_name_en'] = 'Tas System';
        $data['logo'] = 'logo.jpg';
        $data['icon'] = 'icon.jpg';
        $data['email'] = 'info@app.com';
        $data['phone'] = '+9640000000';
        $data['slots_number_validation'] = '14';
        $data['start_at'] = '16:00:00';
        $data['end_at'] = '20:00:00';
        $data['currency'] = 'USD';
        $data['address'] = 'Amman,Jordan';
        $data['facebook'] = 'www.facebook.com';
        $data['twitter'] = 'www.twitter.com';
        $data['instagram'] = 'www.instagram.com';
        $data['main_lang'] = 'arabic';
        $data['description'] = 'Description Here';
        $data['keywords'] = 'dashboard,dash,Tas,Tas System';
        $data['status'] = 'open';
        $data['message_maintenance'] = 'Now Site In Maintenance Try Again Later';

        DB::table('settings')->insert($data);
    }
}
