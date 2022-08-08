<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ArticleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->url,
            'user'=>$this->UserResource::make($this->user),
        ];
    }
}
