<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(!empty($request->date)) {
            $curent_user_position = $this->user->current_user_position($request->date)->first();
        } else {
            $curent_user_position = $this->user->current_user_position()->first();
        }
        return [
            'id' => $this->user->id,
            'name' => !(empty($curent_user_position)) ? $curent_user_position->name : null,
            'position_name' => !(empty($curent_user_position)) ? $curent_user_position->position_name : null,
            'photo_url' => $this->user->photo_url,
        ];
    }
}
