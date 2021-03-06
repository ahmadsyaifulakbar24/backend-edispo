<?php

namespace App\Http\Resources\DispositionAssignment;

use App\Http\Resources\MailDisposition\MailDispositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DispositionAssignmentResource extends JsonResource
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
                'position_name' => $this->receiver->position_name
            ],
            'position_name' => $this->position_name,
            'mail_disposition' => new MailDispositionResource($this->mail_disposition),
            'read' => $this->read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
