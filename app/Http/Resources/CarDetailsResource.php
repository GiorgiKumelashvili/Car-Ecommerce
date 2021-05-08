<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarDetailsResource extends JsonResource {
    public function toArray($request): array {
        return [
            "id" =>$this->id,
            "name" =>$this->name,
            "car_details_id" =>$this->car_details_id,
            "price_usd" =>$this->price_usd,
            "distance" =>$this->distance,
            "is_levied" =>$this->is_levied,
            "category" =>$this->category,
            "manufacturer" =>$this->manufacturer,
            "model" =>$this->model,
            "release_year" =>$this->release_year,
            "fuel_type" =>$this->fuel_type,
            "engine_capacity" =>$this->engine_capacity,
            "cylinders" =>$this->cylinders,
            "gear_box" =>$this->gear_box,
            "wheel_side" =>$this->wheel_side,
            "color" =>$this->color,
            "vin_code" =>$this->vin_code,
            "description" =>$this->description,
            "email" =>$this->email,
            "number" =>$this->number,
            "city" =>$this->city,
            "images" =>$this->images,
        ];
//        return parent=>toArray($request);
    }
}
