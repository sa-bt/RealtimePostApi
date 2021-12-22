<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            'اندازه',
            'رنگ',
            'ظرفیت باطری',
            'رزولوشن',
        ];

        foreach ($records as $record) {
            Feature::create([
                'title' => $record
            ]);
        }
    }
}
