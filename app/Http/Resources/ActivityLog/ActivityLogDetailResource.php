<?php

namespace App\Http\Resources\ActivityLog;

use App\Http\Resources\DispositionAssigment\SimpleDispositionAssigmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogDetailResource extends JsonResource
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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'position_name' => $this->user->position_name,
            ],
            'disposition_assigment' => SimpleDispositionAssigmentResource::collection($this->disposition_assigment),
            'log' => $this->log,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
