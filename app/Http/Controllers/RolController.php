<?php

namespace App\Http\Controllers;

use App\Http\Resources\Rol\RolCollection;
use App\Http\Resources\Rol\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::get();
        return (new RolCollection($roles))->additional([
        'msg' => [
            'summary' => 'success',
            'detail' => '',
            'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->name = $request->input('name');
        $rol->save();
        return (new RolResource($rol))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function show(Rol $rol)
    {
        return (new RolResource($rol))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function update(Request $request, Rol $rol)
    {
        $rol->name = $request->input('name');
        $rol->save();
        return (new RolResource($rol))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy($rol)
    {
        $rol = Rol::find($rol);
        $rol->delete();
        return (new RolResource($rol))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
