<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Appointment extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'state' => $this->state,
            'partner' => $this->partner->name . ' ' . $this->partner->last_name,
            'afiliate' => $this->afiliate->name . ' ' . $this->afiliate->last_name,
        ];
    }
}
