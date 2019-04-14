<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TextMessage
 * @package ananas
 * @author mikkoaf
 * 
 * @OA\Schema(
 *      description="Text message",
 *      title="Text message",
 * )
 */
class TextMessageResource extends JsonResource
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
            'person_name' => $this->person_name,
            'message' => $this->message,
        ];
    }
}
