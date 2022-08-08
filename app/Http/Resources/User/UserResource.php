<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Rol\RolResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'rol'=>RolResource::make($this->rol),
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'phone'=>$this->phone,
        ];
    }
}
