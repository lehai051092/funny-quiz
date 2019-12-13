<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\UserRepositoryInterface;
use App\User;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    function findById($id)
    {
        return $this->user->findOrFail($id);
    }

    function save($user)
    {
       $user->save();
    }

    function getAll() {
        return $this->user->all();
    }
}
