<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityCoordinates extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->resource;
        // dd($this->resource);
        // return parent::toArray($request);
        return [
            'longitude' => $data->coord->lon,
            'latitude' => $data->coord->lat,
            'name' => $data->name
        ];
    }
}
