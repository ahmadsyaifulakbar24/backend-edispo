<?php

namespace App\Http\Resources\IncomingDisposition;

use App\Http\Resources\FileManager\FileManagerResource;
use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomingDispositionDetailResource extends JsonResource
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
                'id' => ($this->user->role == 'assistant') ? $this->user->user_group()->where('superior', 1)->first()->parent_id : $this->user->id,
                'name' => !empty($curent_user_position) ? $curent_user_position->name : null,
                'username' => $this->user->username,
                'email' => $this->user->email,
                'nip' => $this->user->nip,
                'gender' => $this->user->gender,
                'phone_number' => $this->user->phone_number,
                'position' => $this->user->position,
                'position_name' => !empty($curent_user_position) ? $curent_user_position->position_name : null,
                'role' => $this->user->role,
                'photo_url' => $this->user->photo_url,
                'created_at' => $this->user->created_at,
                'updated_at' => $this->user->updated_at,
            ],
            'agenda_number' => sprintf('%04s', $this->agenda_number) . '-D',
            'mail_number' => $this->mail_number,
            'mail_origin' => $this->mail_origin,
            'regarding' => $this->regarding,
            'mail_date' => $this->mail_date,
            'date_received' => $this->date_received,
            'mail_nature' => new ParamResource($this->mail_nature),
            'mail_security' => new ParamResource($this->mail_security),
            'disposition_from' => $this->disposition_from,
            'summary' => $this->summary,
            'description' => $this->description,
            'addition' => FileManagerResource::collection($this->file_manager),
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // 'incoming_disposition_instruction' => IncomingDispositionInstructionResource::collection($this->incoming_disposition_instruction),
            'incoming_disposition_instruction' => IncomingDispositionInstructionResource::collection($this->incoming_dispo_instruc_many),
        ];
    }
}
