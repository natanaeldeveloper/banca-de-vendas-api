<?php

namespace App\Repositories;

use App\Contracts\SoftDeleteBaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class SoftDeleteBaseRepository extends BaseRepository implements SoftDeleteBaseRepositoryInterface {

    public function __construct(protected Model $model)
    {
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
