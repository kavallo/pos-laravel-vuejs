<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'photo'             => $this->photo,
            'email_verified_at' => $this->email_verified_at ? $this->email_verified_at->format('F d, Y') : '',
            'created_at'        => $this->created_at ? $this->created_at->format('F d, Y') : '',
            'updated_at'        => $this->updated_at ? $this->updated_at->format('F d, Y') : '',
        ];
    }
}
