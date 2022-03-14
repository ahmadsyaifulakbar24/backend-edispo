<?php

namespace App\Http\Resources\Agenda;

use App\Http\Resources\User\UserDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendaDetailResource extends JsonResource
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
            'user' => new UserDetailResource($this->user),
            'agenda_number' => sprintf('%04s', $this->agenda_number).'-UND',
            'mail_number' => $this->mail_number,
            'origin' => $this->origin,
            'regarding' => $this->regarding,
            'date' => $this->date,
            'location' => $this->location,
            'description' => $this->description,
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
