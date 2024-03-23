<?php

namespace App\Hateoas;

use App\Models\Product;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class ProductHateoas
{
    use CreatesLinks;

    public function self(Product $product): ?Link
    {
        return $this->link('product.show', ['stand' => $product->stand_id, 'product' => $product]);
    }

    public function update(Product $product): ?Link
    {
        return $this->link('product.update', ['stand' => $product->stand_id, 'product' => $product]);
    }

    public function delete(Product $product): ?Link
    {
        return $this->link('product.destroy', ['stand' => $product->stand_id, 'product' => $product]);
    }
}
