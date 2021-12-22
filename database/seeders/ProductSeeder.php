<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ['کیف1',1,200000,10],
            ['گوشی1',2,7000000,40],
            ['لب تاپ1',3,30000000,5]
        ];

        foreach ($records as $record) {
            Product::create([
                'name' => $record[0],
                'category_id'=>$record[1],
                'price'=>$record[2],
                'count'=>$record[3],
            ]);
        }
    }
}
