<?php

namespace App\Http\Resources\MailDisposition;

use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Http\Resources\DispositionAssignment\SimpleDispositionAssignmentResource;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Http\Resources\Mail\MailDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MailDispositionResource extends JsonResource
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
            'mail' => new MailDetailResource($this->mail),
            'incoming_disposition' => new IncomingDispositionDetailResource($this->incoming_disposition),
            'agenda' => new AgendaDetailResource($this->agenda),
            'disposition_instruction' => DispositionInsturctionResource::collection($this->disposition_instruction),
            // 'disposition_assignment' => SimpleDispositionAssignmentResource::collection($this->disposition_assignment),
            'disposition_assignment' => SimpleDispositionAssignmentResource::collection($this->disposition_assignment),
            'description' => $this->description,
            'confirmation' => $this->confirmation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
