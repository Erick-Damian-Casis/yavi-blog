<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Rol\RolResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'body'=>$this->body,
            'article'=>ArticleResource::make($this->article),
            'user'=>UserResource::make($this->user),
            'rol'=>RolResource::make($this->user)
        ];
    }
}
