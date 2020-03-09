<?php
namespace App\Repositories;

use App\News;

class NewsRepository implements NewsRepositoryInterface
{

    public function all($data)
    {
        //return News::all();
        print_r($data);
    }

    public function create($data)
    {
        //print_r($data);
        return News::create($data);
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function delete($id)
    {
        return News::destroy($id);
    }

    public function update($id, array $data)
    {
        return News::find($id)->update($data);
    }
}
