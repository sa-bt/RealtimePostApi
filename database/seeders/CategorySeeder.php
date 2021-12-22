<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            'کیف',
            'گوشی',
            'لب تاپ',
        ];

        foreach ($records as $record) {
            Category::create([
                'title' => $record
            ]);
        }
    }
}
