<?php

namespace App\Repositories;

use App\Http\Resources\RoleResourceCollection;
use App\Http\Resources\UserResource;
use App\Repositories\interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    public function login($request)
    {
        if (Auth::attempt($request)) {
            $token = Auth::user()->createToken('authToken')->accessToken;
            return response([
                'accessToken' => $token,
                'user' => new UserResource(Auth::user()),
                'roles' => new RoleResourceCollection(Auth::user()->roles)
            ], 200);
        }
        return null;
    }

    public function save(array $data): \ArrayAccess
    {
        $data['password'] = $password = bcrypt($data['password']);
        $user = parent::save($data);
        $user->attachRole($data['roleId']);
        return $user;
    }

}
