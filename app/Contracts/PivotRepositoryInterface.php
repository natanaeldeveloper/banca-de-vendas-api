<?php

namespace App\Contracts;

interface PivotRepositoryInterface
{

    public function getAll($relationId);

    public function paginate($relationId, int $perPage);

    public function add($relationId, $id);

    public function delete(int $id);
}