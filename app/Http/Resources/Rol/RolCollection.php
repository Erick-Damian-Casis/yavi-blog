<?php

namespace App\Http\Resources\Rol;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RolCollection extends ResourceCollection
{
    public $collects= RolResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
