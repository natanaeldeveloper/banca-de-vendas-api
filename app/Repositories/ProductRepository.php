<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository {

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function checkBelongsTo($standId, $productId)
    {
        return $this->model
            ->where('stand_id', $standId)
            ->where('id', $productId)
            ->count() > 0;
    }

    public function whereByStandIdPaginate(int $standId, int $perPage = 10)
    {
        return $this->model->where('stand_id', $standId)->paginate($perPage);
    }
}
