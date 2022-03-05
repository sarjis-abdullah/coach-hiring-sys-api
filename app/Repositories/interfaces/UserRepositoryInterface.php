<?php


namespace App\Repositories\interfaces;


interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function login($request);
}
