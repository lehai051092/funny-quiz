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

    function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    function update($request, $id)
    {
        $user = $this->userRepository->findById($id);

        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;

        if ($request->image) {
            $image = $request->file('image');
            $path = $image->store("img", "public");
            Storage::delete('public/' . $user->image);
            $user->image = $path;
        }

        $user->save();
    }
}
