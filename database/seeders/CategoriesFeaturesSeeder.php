<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            1=>[1,2],
            2=>[1,2,3,4],
            3=>[1,2,3,4],
        ];

        foreach ($records as $key=>$record) {
            Category::query()->find($key)->features()->sync($record);;
        }
    }
}
