<?php

namespace App\Http\Resources\DispositionAssignment;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleDispositionAssignmentResource extends JsonResource
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
        ];
    }
}
