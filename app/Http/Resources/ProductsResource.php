<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'product_name'=>$this->product_name,
            'tags'=>explode(',',$this->tags),
            'price'=>$this->price,
            'size'=>explode(',',$this->size),
            'brands'=>explode(',',$this->brands),
            'description'=>$this->description,
            'categories'=>explode(',',$this->categories),
            'image_url'=>explode(',',$this->image_url),
        ];
    }
}
