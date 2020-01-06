<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\PointRepositoryInterface;
use App\Point;

class PointRepositoryEloquent implements PointRepositoryInterface
{
    protected $point;

    public function __construct(Point $point)
    {
        $this->point=$point;
    }

    public function getAll()
    {
       return $this->point->all();
    }
}
