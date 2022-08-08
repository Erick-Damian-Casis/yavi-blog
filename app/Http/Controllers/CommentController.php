<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::get();
        return (new CommentCollection($comments))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])
            ->response()->setStatusCode(200);
    }


    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->article()->associate(Article::find($request->input('article.id')));
        $comment->user()->associate(User::find($request->input('user.id')));
        $comment->body = $request->input('body');
        $comment->save();
        return (new CommentResource($comment))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])
            ->response()->setStatusCode(200);
    }


    public function show(Comment $comment)
    {
        return (new CommentResource($comment))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])
            ->response()->setStatusCode(200);
    }


    public function update(Request $request, Comment $comment)
    {
        $comment->article()->associate(Article::find($request->input('article.id')));
        $comment->user()->associate(User::find($request->input('user.id')));
        $comment->body = $request->input('body');
        $comment->save();

        return (new CommentResource($comment))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])
            ->response()->setStatusCode(200);
    }


    public function destroy($comment)
    {
        $comment = Article::find($comment);
        $comment->delete();
        return (new CommentResource($comment))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])
            ->response()->setStatusCode(200);
    }
}
