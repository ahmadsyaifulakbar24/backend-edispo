<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Param\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
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
            'id' => ($this->role == 'assistant') ? $this->user_group()->first()->parent_id : $this->id ,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'nip' => $this->nip,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,
            'position' => $this->position,
            'position_name' => $this->position_name,
            'role' => $this->role,
            'photo_url' => $this->photo_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
