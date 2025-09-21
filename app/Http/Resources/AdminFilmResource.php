<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminFilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'warranty' => $this->warranty,
            'price' => $this->price,
            'uv_rejection' => $this->uv_rejection,
            'thickness' => $this->thickness,
            'created_at' => $this->created_at?->diffForHumans(),
            'updated_at' => $this->updated_at?->diffForHumans(),
            'category' => $this->category,
        ];
    }
}
