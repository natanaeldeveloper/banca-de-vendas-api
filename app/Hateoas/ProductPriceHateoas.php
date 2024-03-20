<?php

namespace App\Hateoas;

use App\Models\ProductPrice;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class ProductPriceHateoas
{
    use CreatesLinks;

    public function self(ProductPrice $productPrice) : ?Link
    {
        //
    }
}
