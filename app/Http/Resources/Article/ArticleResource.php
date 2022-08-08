<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\User\UserResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'url'=>$this->url,
            'user'=>UserResource::make($this->user),
        ];
    }

}
