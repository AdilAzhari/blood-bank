<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'phone' => $this->phone,
            'd_o_b' => $this->d_o_b,
            'last_donation_date' => $this->last_donation_date,
            'city_id' => $this->city_id,
            'blood_type_id' => $this->blood_type_id,
            'is_active' => $this->is_active,
            'city' => CityResource::make($this->whenLoaded('city')),
            'blood_type' => BloodTypeResource::make($this->whenLoaded('blood_type')),
        ];
    }
}
