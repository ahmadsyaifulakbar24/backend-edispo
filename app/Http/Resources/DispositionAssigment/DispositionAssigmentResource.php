<?php

namespace App\Http\Resources\DispositionAssigment;

use App\Http\Resources\MailDisposition\MailDispositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DispositionAssigmentResource extends JsonResource
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
            'mail_disposition' => new MailDispositionResource($this->mail_disposition),
        ];
    }
}
