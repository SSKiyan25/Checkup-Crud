<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'email' => $this->email,
            'number' => $this->number,
            'address' => $this->address,
            'brgy_id' => $this->brgy_id,
            'case_type' => $this->case_type,
            'coronavirus_status' => $this->coronavirus_status,
            'city' => new CityResource($this->whenLoaded('city')),
            'brgy' => new BrgyResource($this->whenLoaded('brgy')),
        ];
    }
}