<?php

namespace App\Repositories;

use App\Models\Stand;

class StandRepository extends BaseRepository {

    public function __construct(Stand $stand)
    {
        parent::__construct($stand);
    }
}
