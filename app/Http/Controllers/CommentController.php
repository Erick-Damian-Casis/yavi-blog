<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::get();
        return response()->json(
            [
                'data'=>$comments,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->article()->associate(Article::find($request->input('article.id')));
        $comment->user()->associate(User::find($request->input('user.id')));
        $comment->body = $request->input('body');
        $comment->save();
        return response()->json(
            [
                'data'=>$comment,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function show(Comment $comment)
    {
        return response()->json(
            [
                'data'=>$comment,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }


    public function update(Request $request, Comment $comment)
    {
        $comment->article()->associate(Article::find($request->input('article.id')));
        $comment->user()->associate(User::find($request->input('user.id')));
        $comment->body = $request->input('body');
        $comment->save();
        return response()->json(
            [
                'data'=>$comment,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }


    public function destroy($comment)
    {
        $comment = Article::find($comment);
        $comment->delete();
        return response()->json(
            [
                'data'=>$comment,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }
}
