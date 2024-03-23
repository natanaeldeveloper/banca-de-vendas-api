<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'pix_key',
        'pix_key_owner',
        'color',
        'allow_future_payment'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
