<?php


namespace App\Http\Services;


interface UserServiceInterface
{
    function findById($id);

    function update($request, $id);

    function updateImage($request, $id);
}
