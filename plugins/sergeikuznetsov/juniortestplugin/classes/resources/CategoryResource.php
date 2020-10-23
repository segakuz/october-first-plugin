<?php

namespace SergeiKuznetsov\JuniorTestPlugin\Classes\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products' => $this->products->map(function($item){
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'image' => $item->image,
                    'categories' => $item->categories->map(function($item){
                        return ['id' => $item->id, 'name' => $item->name];
                    })
                ];
            })
        ];
    }
}
