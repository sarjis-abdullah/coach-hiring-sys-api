<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Repositories\interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all data from users table.
     *
     * @param IndexUserRequest $request
     * @return UserResourceCollection
     */

    public function index(IndexUserRequest $request)
    {
        $items  = $this->repository->findBy($request->all());
        return new UserResourceCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LoginRequest $request
     * @return Application|ResponseFactory|Response
     */

    public function login(LoginRequest $request)
    {
        $item = $this->repository->login($request->all());
        if ($item == null){
            return response(['message' => 'Email or Password is Incorrect!'], 422);
        }
        return $item;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegistrationRequest $request
     * @return UserResource
     */
    public function registration(RegistrationRequest $request)
    {
        $user = $this->repository->save($request->all());
        return new UserResource($user);
    }
}
