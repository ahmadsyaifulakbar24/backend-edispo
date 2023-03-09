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
        $curent_user_position = $this->user->current_user_position($this->updated_at)->first();
        return [
            'id' => $this->id,
            'user' => [
                'id' => ($this->user->role == 'assistant') ? $this->user->user_group()->first()->parent_id : $this->user->id ,
                'name' => !empty($curent_user_position) ? $curent_user_position->name : null,
                'username' => $this->user->username,
                'email' => $this->user->email,
                'nip' => $this->user->nip,
                'nik' => $this->user->nik,
                'gender' => $this->user->gender,
                'phone_number' => $this->user->phone_number,
                'position' => $this->user->position,
                'position_name' => !empty($curent_user_position) ? $curent_user_position->position_name : null,
                'role' => $this->user->role,
                'photo_url' => $this->user->photo_url,
                'created_at' => $this->user->created_at,
                'updated_at' => $this->user->updated_at,
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
