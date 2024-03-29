<?php

namespace App\Http\Resources\Agenda;

use App\Http\Resources\FileManager\FileManagerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $curent_user_position = $this->user->current_user_position($this->updated_at)->first();

        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => !empty($curent_user_position) ? $curent_user_position->name : null,
                'position_name' => !empty($curent_user_position) ? $curent_user_position->position_name : null,
            ],
            'agenda_number' => sprintf('%04s', $this->agenda_number).'-UND',
            'mail_number' => $this->mail_number,
            'origin' => $this->origin,
            'regarding' => $this->regarding,
            'agenda_date' => $this->agenda_date,
            'date_received' => $this->date_received,
            'date' => $this->date,
            'location' => $this->location,
            'description' => $this->description,
            'document' => !empty($this->file_manager()->first()->path_url) ? $this->file_manager()->first()->path_url : null,
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
