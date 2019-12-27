<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\PointRepositoryInterface;
use App\Http\Services\PointServiceInterface;

class PointServiceImpl implements PointServiceInterface
{
    protected $pointRepository;
    public function __construct(PointRepositoryInterface $pointRepository)
    {
        $this->pointRepository=$pointRepository;
    }

    public function getAll()
    {
        return $this->pointRepository->getAll();
    }
}
