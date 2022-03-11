<?php

namespace App\Http\Resources\DispositionAssigment;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleDispositionAssigmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'receiver' => [
                'id' => $this->receiver->id,
                'name' => $this->receiver->name,
                'position_name' => $this->receiver->position_name,
            ],
            'position_name' => $this->position_name,
        ];
    }
}
