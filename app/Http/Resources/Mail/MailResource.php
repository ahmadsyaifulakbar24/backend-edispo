<?php

namespace App\Http\Resources\Mail;

use Illuminate\Http\Resources\Json\JsonResource;

class MailResource extends JsonResource
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
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
        ];
    }
}
