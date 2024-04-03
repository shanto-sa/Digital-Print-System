<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use App\Models\SystemSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSettings::create([
            'site_title' => 'আরাফাত প্রিন্ট',
            'site_logo' => 'logo.png',
            'contact_person' => 'Arafat Hossain',
            'email' => 'arafatprint@gmail.com',
            'phone' => '+880 1992327887',
            'address_line_1' => 'B/5 Ambita Bashu Lane , RN Road , Jashore',
            'address_line_2' => '',
            'city' => 'Jashore',
            'state' => 'Khulna',
            'zipcode' => '7400',
        ]);

        SystemSettings::create([
            'date_format' => 'd-M-Y',
            'time_zone' => 'Asia/Dhaka',
            'currency_code' => 'BDT',
            'currency_symbol' => '৳',
            'currency' => 'symbol',
            'currency_position' => 'prefix'
        ]);
    }
}
