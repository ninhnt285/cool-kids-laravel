<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'date' => $this->date,
            'time' => $this->time,
            'description' => $this->description,


            'image_path' => $this->image_path,
            'image_url' => $this->image_path ? asset('storage' . $this->image_path) : null,
            'short_description' => $this->short_description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
