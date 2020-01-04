<?php


namespace App\Http\Repositories;


class BaseRepository
{
    public function getAll($obj)
    {
        return $obj->all();
    }

    public function findById($obj, $id)
    {
        return $obj->findOrFail($id);
    }

    public function get($obj)
    {
        return $obj->get();
    }

    public function save($obj)
    {
        return $obj->save();
    }

    public function delete($obj){
       return $obj->delete();
    }
}
