<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffered extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'products_offered';

    protected $fillable = [
        'product_id',
        'notebook_id',
        'count_offered'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }
}