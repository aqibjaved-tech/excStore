<?php


namespace App\Http\Controllers;
use App\Repositories\NewsRepositoryInterface;


class NewsController extends Controller
{
    protected $repository;

    public function __construct(NewsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store()
    {
        $input = app('request')->get('sdn');
        $news = $this->repository->all($input);
    }
}
