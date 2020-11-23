<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'event_title' => $this-> title,
            'event_description' => $this->description,
            'created_by' => $this->creator->name,
            'status' => $this->status == '1'?'Open':'Close',
        ];
    }
}
