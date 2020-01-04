<?php


namespace App\Http\Repositories;


interface BaseRepositoryInterface
{
    public function getAll($obj);

    public function findById($obj, $id);

    public function get($obj);

    public function save($obj);

    public function delete($obj);
}
