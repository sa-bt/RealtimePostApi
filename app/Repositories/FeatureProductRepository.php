<?php

namespace App\Repositories;

use App\Models\FeatureProduct;
use App\Models\Product;

class FeatureProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function create($product,$request)
    {
        return $product->features()->create([
            'feature_id' => $request->feature_id,
            'item_id' => $request->item_id,
        ]);
    }

    public function edit($product,$feature, $request)
    {
        return $product->features()->find($feature)->update([
            'feature_id' => $request->feature_id,
            'item_id' => $request->item_id,
        ]);
    }

    public function delete($product, $feature)
    {
        return $product->features()->find($feature)->delete();
    }

}
