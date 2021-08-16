<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Afiliate extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'state' => $this->user->state,
            'name' => $this->user->name . " " . $this->user->last_name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'user_id' => $this->user->id,
        ];
    }
}
