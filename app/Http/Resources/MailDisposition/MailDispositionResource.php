<?php

namespace App\Http\Resources\MailDisposition;

use App\Http\Resources\DispositionAssigment\SimpleDispositionAssigmentResource;
use App\Http\Resources\Mail\MailDetailResource;
use App\Http\Resources\Mail\MailResource;
use App\Http\Resources\Param\ParamResource;
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
            // 'disposition_instruction' => ParamResource::collection($this->disposition_instruction),
            'disposition_instruction' => DispositionInsturctionResource::collection($this->disposition_instruction),
            'disposition_assingment' => SimpleDispositionAssigmentResource::collection($this->disposition_assigment),
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
