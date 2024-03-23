<?php

namespace App\Contracts;

interface SoftDeleteBaseRepositoryInterface {

    public function delete(int $id);

    public function findAllDeleted();

    public function restore(int $id);

    public function forceDelete(int $id);

}
