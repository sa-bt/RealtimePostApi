<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProducFeaturestResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            $this->feature->title => $this->item->title,
        ];
    }
}
