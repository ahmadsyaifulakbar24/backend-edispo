<?php

namespace App\Http\Resources\DispositionAssigment;

use App\Http\Resources\MailDisposition\MailDispositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DispositionAssigmentResource extends JsonResource
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
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name
            ],
            'receiver' => [
                'id' => $this->receiver->id,
                'name' => $this->receiver->name
            ],
            'mail_disposition' => new MailDispositionResource($this->mail_disposition),
            'read' => $this->read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
