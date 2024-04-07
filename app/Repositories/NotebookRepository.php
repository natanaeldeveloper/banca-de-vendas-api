<?php

namespace App\Repositories;

use App\Models\Notebook;

class NotebookRepository extends BaseRepository
{

    public function __construct(Notebook $notebook)
    {
        parent::__construct($notebook);
    }

    public function checkBelongsTo($standId, $notebookId)
    {
        return $this->model
            ->where('stand_id', $standId)
            ->where('id', $notebookId)
            ->exists();
    }

    public function getWhereByStandIdPaginate(int $standId, int $perPage = 10)
    {
        return $this->model->where('stand_id', $standId)->paginate($perPage);
    }

    public function getWhereByStandId(int $standId)
    {
        return $this->model->where('stand_id', $standId)->get();
    }
}