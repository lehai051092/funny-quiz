<?php


namespace App\Http\Repositories;


interface CategoryRepositoryInterface
{
    function getAll();

    function findById($id);

    function store($obj);

    function delete($obj);

    function update($obj);

    function search($keyword);

}
