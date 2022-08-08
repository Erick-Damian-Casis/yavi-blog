<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    public $collects = ArticleResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
