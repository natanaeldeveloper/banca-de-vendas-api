<?php

namespace App\Contracts;

interface RepositoryInterface {

    public function findAll();

    public function paginate(int $perPage);

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function forceDelete(int $id);

    public function findAllDeleted();
}
