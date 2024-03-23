<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    use HasLinks;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stand_id' => $this->stand_id,
            'name' => $this->name,
            'code' => $this->code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'links' => $this->links(),
        ];
    }
}
