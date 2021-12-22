<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function create($request)
    {
        return Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'count' => $request->count,
            'price' => $request->price,
        ]);
    }

    public function edit($product, $request)
    {
        return $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'count' => $request->count,
            'price' => $request->price,
        ]);
    }

    public function delete($product)
    {
        return $product->delete();
    }

}
