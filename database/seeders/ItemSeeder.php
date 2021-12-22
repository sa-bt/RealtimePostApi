<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, [10, 20, 30]],
            [2, ['red', 'blue', 'green']],
            [3, [2000, 3000, 4000, 5000]],
            [4, ['HD', '4K', 'FULL HD']]
        ];

        foreach ($records as  $record) {
            foreach ($record[1] as $item)
                Item::create([
                    'title' => $item,
                    'feature_id' => $record[0]
                ]);
        }
    }
}
