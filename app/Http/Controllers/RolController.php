<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function index()
    {
        $roles = Rol::get();
        return response()->json(
            [
                'data'=>$roles,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
    ]
            ],200
        );
    }

    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->url = $request->input('name');
        $rol->save();
        return response()->json(
            [
                'data'=>$rol,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function show(Rol $rol)
    {
        return response()->json(
            [
                'data'=>$rol,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function update(Request $request, Rol $rol)
    {
        $rol->url = $request->input('name');
        $rol->save();
        return response()->json(
            [
                'data'=>$rol,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }

    public function destroy($rol)
    {
        $rol = Rol::find($rol);
        $rol->delete();
        return response()->json(
            [
                'data'=>$rol,
                'msg'=>[
                    'detail'=>'succes',
                    'code'=>'200'
                ]
            ],200
        );
    }
}
