<?php

namespace App\Contracts;

interface SoftDeleteBaseRepositoryInterface {

    public function delete(int $id);

    public function getAllDeleted();

    public function restore(int $id);

    public function forceDelete(int $id);

}
