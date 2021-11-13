<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Futsal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'jersey' => $this->jersey,
            'name' => $this->name,
            'position' => $this->position,
        ];
    }
}
