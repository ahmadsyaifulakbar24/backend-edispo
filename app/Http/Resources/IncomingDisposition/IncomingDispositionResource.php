<?php

namespace App\Http\Resources\IncomingDisposition;

use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomingDispositionResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'agenda_number' => sprintf('%04s', $this->agenda_number) . '-D',
            'mail_number' => $this->mail_number,
            'mail_origin' => $this->mail_origin,
            'regarding' => $this->regarding,
            'mail_date' => $this->mail_date,
            'date_received' => $this->date_received,
            'mail_nature' => new ParamResource($this->mail_nature),
            'mail_security' => new ParamResource($this->mail_security),
            'summary' => $this->summary,
            'disposition_from' => $this->disposition_from,
            'description' => $this->description,
            'disposition' => $this->disposition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
