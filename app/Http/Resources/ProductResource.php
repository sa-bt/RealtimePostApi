<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'count'=>$this->count,
            'category_id'=>$this->category_id,
            'category_name'=>$this->category->title,
            'created_at'=>$this->created_at,
            'features'=>ProducFeaturestResource::collection($this->features),

        ];
    }
}
