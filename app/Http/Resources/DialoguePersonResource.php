<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DialoguePersonResource extends JsonResource
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
            'name' => $this->person_name,
        ];
    }
}
