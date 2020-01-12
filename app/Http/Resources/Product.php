<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
             return [
            'id' => $this->ID_SanPham,
            'name' => $this->TenSanPham,
            'price' => $this->Gia,
            'descript' => $this->MoTa,
            'image' => $this->HinhAnh
        ];

    }
}
