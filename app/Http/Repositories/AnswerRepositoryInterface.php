<?php


namespace App\Http\Repositories;


interface AnswerRepositoryInterface
{
    function getAll();

    function findById($id);

    function store($obj);

    function delete($obj);

    function update($obj);

    function saveA($answer);
}
