<?php


namespace App\Http\Repositories;


interface UserRepositoryInterface
{
    function findById($id);

    function save($user);

    function getAll();
}
