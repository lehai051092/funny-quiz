<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\Eloquent\UserRepositoryEloquent;
use App\Http\Services\UserServiceInterface;

class UserServiceImpl implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryEloquent $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
