<?php


namespace App\Http\Services;


interface TestServiceInterface
{
    function getAll();

    function findById($id);

    function store($request);

    function delete($id);

    function update($request, $id);
}
