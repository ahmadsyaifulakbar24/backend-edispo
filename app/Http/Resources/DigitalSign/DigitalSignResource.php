<?php

namespace App\Http\Resources\DigitalSign;

use Illuminate\Http\Resources\Json\JsonResource;

class DigitalSignResource extends JsonResource
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
            ],
            'mail_number' => $this->mail_number,
            'purpose' => $this->purpose,
            'regarding' => $this->regarding,
            'sign_date' => $this->sign_date,
            'file_url' => $this->file_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
