<?php

namespace SergeiKuznetsov\JuniorTestPlugin\Classes\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,
            'categories' => $this->categories->map(function($item){
                return ['id' => $item->id, 'name' => $item->name];
            })
        ];
    }
}
