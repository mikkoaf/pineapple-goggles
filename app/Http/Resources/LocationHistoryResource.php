<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationHistoryResource extends JsonResource
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
            'person_id' => $this->dialoguePerson->id,
            'timestamp' => $this->timestamp,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
