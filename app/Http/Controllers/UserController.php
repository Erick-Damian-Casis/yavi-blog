<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index()
    {
        $users = User::get();
        return response()->json(
            [
                'data'=>$users,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function store(Request $request)
    {
        $user= new User();
        $user->rol()->associate(Rol::find($request->input('rol.id')));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->save();
        return response()->json(
            [
                'data'=>$user,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }


    public function show(User $user)
    {
        return response()->json(
            [
                'data'=>$user,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }


    public function update(Request $request, User $user)
    {
        $user->rol()->associate(Rol::find($request->input('rol.id')));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->save();
        return response()->json(
            [
                'data'=>$user,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();
        return response()->json(
            [
                'data'=>$user,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }
}
