<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        return (new UserResource($users))->additional([
        'msg' => [
            'summary' => 'success',
            'detail' => '',
            'code' => '200'
            ]
        ])->response()->setStatusCode(200);
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
        return (new UserResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }


    public function show(User $user)
    {
        return (new UserResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }


    public function update(Request $request, User $user)
    {
        $user->rol()->associate(Rol::find($request->input('rol.id')));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->save();
        return (new UserResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();
        return (new UserResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
