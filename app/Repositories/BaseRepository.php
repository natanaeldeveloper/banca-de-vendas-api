<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface {

    public function __construct(protected Model $model)
    {
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function paginate(int $perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $stand = $this->model->findOrFail($id);
        $stand->update($data);
        return $stand;
    }

    public function delete(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function findAllDeleted()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function restore(int $id)
    {
        $this->model->onlyTrashed()->findOrFail($id)->restore();
        return $this->model->findOrFail($id);
    }

    public function forceDelete(int $id)
    {
        return $this->model->onlyTrashed()->findOrFail($id)->forceDelete();
    }
}
