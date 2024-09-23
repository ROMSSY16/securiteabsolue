<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'logo' => 'images/logo.png',
            'no_telephone' => '+225 07 79 24 02 68 ',
            'no_telephone2' => '05 02 40 94 82',
            'email' => 'kyliansoro@gmail.com',
            'email2' => '',
            'horaires' => 'Lundi - Vendredi : 9h00 - 18h00',
            'link_fb' => 'https://www.facebook.com/profile.php?id=61550845094511',
            'link_tw' => 'https://twitter.com/example',
            'link_ld' => 'https://linkedin.com/in/example',
            'localisation' => 'Cocody Riviera Palmeraie,Abidjan, Côte d\'Ivoire,',
            'longitude' => '12.345678',
            'latitude' => '-98.765432',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
