<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\User\UserResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user'=>$this->UserResource::make($this->user),
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->url,
        ];
    }

}
