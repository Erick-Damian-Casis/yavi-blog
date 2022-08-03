<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::get();
        return response()->json(
            [
                'data'=>$articles,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->user()->associate(User::find($request->input('user.id')));
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->url = $request->input('url');
        $article->save();
        return response()->json(
            [
                'data'=>$article,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function show(Article $article)
    {
        return response()->json(
            [
                'data'=>$article,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function update(Request $request, Article $article)
    {
        $article->user()->associate(User::find($request->input('user.id')));
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->url = $request->input('url');
        $article->save();
        return response()->json(
            [
                'data'=>$article,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function destroy($article)
    {
        $article = Article::find($article);
        $article->delete();
        return response()->json(
            [
                'data'=>$article,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }
}
