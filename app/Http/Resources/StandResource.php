<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StandResource extends JsonResource
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
            'name' => $this->name,
            'color' => $this->color,
            'pix_key' => $this->pix_key,
            'pix_key_owner' => $this->pix_key_owner,
            'allow_future_payment' => $this->allow_future_payment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'links' => $this->links(),
        ];
    }
}
