<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id'              => $this->id,
            'first_name'      => $this->first_name,
            'last_name'       => $this->last_name,
            'age'             => $this->age,
            'mobile_number'   => $this->mobile_number,
            'aadhar_number'   => $this->aadhar_number,
            'email'           => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'type'            => $this->type,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
            // 'password' and 'remember_token' are sensitive, usually not exposed
        ];
    }
}
