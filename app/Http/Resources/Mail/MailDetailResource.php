<?php

namespace App\Http\Resources\Mail;

use App\Http\Resources\FileManager\FileManagerResource;
use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MailDetailResource extends JsonResource
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
            'agenda_number' => sprintf('%04s', $this->agenda_number).'-'.$this->mail_category_code,
            'mail_category_code' => $this->mail_category_code,
            'mail_number' => $this->mail_number,
            'mail_origin' => $this->mail_origin,
            'regarding' => $this->regarding,
            'mail_date' => $this->mail_date,
            'date_received' => $this->date_received,
            'mail_type' => new ParamResource($this->mail_type),
            'mail_nature' => new ParamResource($this->mail_nature),
            'mail_security' => new ParamResource($this->mail_security),
            'summary' => $this->summary,
            'addition' => FileManagerResource::collection($this->file_manager),
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
