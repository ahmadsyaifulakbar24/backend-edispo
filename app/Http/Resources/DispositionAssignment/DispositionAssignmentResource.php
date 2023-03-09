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
        if(!empty($this->receiver)) {
            $curent_user_position = $this->receiver->current_user_position($this->updated_at)->first();
        }

        return [
            'id' => $this->id,
            'receiver' => !empty($this->receiver) ? [
                'id' => $this->receiver->id,
                'name' => !empty($curent_user_position) ? $curent_user_position->name : null,
                'position_name' => !empty($curent_user_position) ? $curent_user_position->position_name : null,
            ] : null,
            'position_name' => $this->position_name,
            'mail_disposition' => new MailDispositionResource($this->mail_disposition),
            'read' => $this->read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
