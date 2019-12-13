<?php


namespace App\Http\Repositories;


interface QuizRepositoryInterface
{
    function getAll();

    function findById($id);

    function store($obj);

    function delete($obj);

    function update($obj);
}
