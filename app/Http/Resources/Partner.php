<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Partner extends JsonResource
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
            'business' => $this->business,
            'description' => $this->description,
            'address' => $this->address,
            'name' => $this->user->name . " " . $this->user->last_name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'user_id'=>$this->user->id,
        ];
    }
}
