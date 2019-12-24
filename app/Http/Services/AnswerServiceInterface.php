<?php


namespace App\Http\Services;


interface AnswerServiceInterface
{
    function getAll();

    function findById($id);

    function store($request);

    function delete($id);

    function update($request, $id);

    function save($answer);

}
