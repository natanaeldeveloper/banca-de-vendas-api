<?php

namespace App\Repositories;

use App\Models\Stand;

class StandRepository extends SoftDeleteBaseRepository {

    public function __construct(Stand $stand)
    {
        parent::__construct($stand);
    }
}
