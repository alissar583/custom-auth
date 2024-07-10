<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status
        ];
        $owner = UserResource::make($this->whenLoaded('user'))->resolve();
        $owner = [
            'id' => $owner['id'],
            'name' => $owner['name']
        ];

        $data['owner'] = $owner;
        return $data;
    }
}
