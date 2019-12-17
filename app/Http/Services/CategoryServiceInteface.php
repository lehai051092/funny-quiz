<?php


namespace App\Http\Services;


interface CategoryServiceInteface
{
    function getAll();

    function findById($id);

    function store($request);

    function delete($id);

    function update($request, $id);

    function search($keyword);
}
