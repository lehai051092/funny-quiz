<?php


namespace App\Http\Services;


interface QuestionServiceInterface
{
    function getAll();

    function findById($id);

    function store($request);

    function delete($id);

    function update($request, $id);

    function updateQuiz($request, $id);
}
