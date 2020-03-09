<?php
namespace App\Repositories;

interface NewsRepositoryInterface
{

    public function all($data);

    public function create($data);

    public function find($id);

    public function delete($id);

    public function update($id, array $data);
}
